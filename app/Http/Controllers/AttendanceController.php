<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Session;
use Response;

class AttendanceController extends AppBaseController
{

    /**
     * Display a listing of the Attendance.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Attendance $attendances */
        $attendances = Attendance::OrderBy('created_at', 'desc')->paginate(15);
        if ($attendances->isEmpty()) {
            Flash::warning('Bạn chưa đăng ký thông tin nhân viên.');
        }
        return view('attendances.index')
            ->with('attendances', $attendances);
    }

    public function search(Request $request)
    {
        $search = $request->post();
        $attendance = Attendance::where(['deleted_at' => null])->OrderBy('created_at', 'desc');

        if (isset($search['date_from']) || isset($search['date_to'])) {
            if (!isset($search['date_from'])) {
                $search['date_from'] = '1970-01-01';
            }
            if (!isset($search['date_to'])) {
                $search['date_to'] = '2100-12-31';
            }
            $from = date('Y-m-d H:i:s', strtotime($search['date_from'] . ' 00:00:00'));
            $to = date('Y-m-d H:i:s', strtotime($search['date_to'] . ' 23:23:59'));
            $attendance->whereBetween('date', [$from, $to]);
        }
        if (isset($search['status'])) {
            $attendance->where(['status' => $search['status']]);
        }
        if (isset($search['employee_id'])) {
            $attendance->where(['employee_id' => $search['employee_id']]);
        }

        $attendance = $attendance->paginate(15);
        return view('attendances.index')
            ->with('attendances', $attendance,)->with('count', $attendance->total());
    }

    /**
     * Show the form for creating a new Attendance.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        $employees = \App\Models\Employee::where(['status' => 0])->get();
        if ($employees->isEmpty()) {
            Flash::warning('Bạn chưa đăng ký thông tin nhân viên.');
        }
        return view('attendances.create');
    }

    public function createAdditional()
    {

        return view('attendances.create-additional');
    }

    /**
     * Store a newly created Attendance in storage.
     *
     * @param CreateAttendanceRequest $request
     *
     * @return Response
     */
    public function store(CreateAttendanceRequest $request)
    {
        $input = $request->all();

        $index = [];
        $errors = [];
        $error_message = '<ul>';
        foreach ($input['employee_id'] as $key => $item) {
            $check = Attendance::where(['employee_id' => $item])->get();
            if ($check != null) {
                foreach ($check as $check_item) {
                    if (date('d-m-Y', strtotime($check_item->date)) == date('d-m-Y', strtotime($input['date'][$key]))) {
                        $employee = Employee::where(['id' => $item])->first();
                        $errors[$key]['name'] = $employee->name;
                        $errors[$key]['date'] = date('d-m-Y', strtotime($check_item->date));
                    }
                }
            }
            $index[$key]['employee_id'] = $item;
        }
        if ($errors != []) {
            foreach ($errors as $error) {
                $error_message .= '<li>Nhân viên ' . $error['name'] . ' đã chấm công ngày ' . $error['date'] . '</li>';
            }
            $error_message .= '</ul>';
            Flash::error($error_message);
            return redirect(route('attendances.create'));

        }
        foreach ($input['status'] as $key => $item) {
            $index[$key]['status'] = $item;
        }
        foreach ($input['reason'] as $key => $item) {
            $index[$key]['reason'] = $item;
        }
        foreach ($input['date'] as $key => $item) {
            $index[$key]['date'] = $item;
        }
        foreach ($index as $item) {
            $attendance = new Attendance();
            $attendance->fill($item)->save();
        }

        Flash::success('Chấm công ngày ' . date('d-m-Y', time()) . ' đã hoàn thành.');

        return redirect(route('attendances.index'));
    }

    public function storeAdditional(CreateAttendanceRequest $request)
    {
        $input = $request->all();


        $errors = [];
        $error_message = '<ul>';
        $check = Attendance::where(['employee_id' => $input['employee_id']])->get();
        if ($check != null) {
            foreach ($check as $check_item) {
                if (date('d-m-Y', strtotime($check_item->date)) == date('d-m-Y', strtotime($input['date']))) {
                    $employee = Employee::where(['id' => $input['employee_id']])->first();
                    $errors['name'] = $employee->name;
                    $errors['date'] = date('d-m-Y', strtotime($check_item->date));
                }
            }
        }
        if ($errors != []) {
            $error_message .= '<li>Nhân viên ' . $errors['name'] . ' đã chấm công ngày ' . $errors['date'] . '</li>';
            $error_message .= '</ul>';
            Flash::error($error_message);
            return redirect(route('attendance-create-additional'));

        }

        $attendance = new Attendance();
        $attendance->fill($input)->save();
        //Attendance::create($input);
        $employee = \App\Models\Employee::where(['status' => 0, 'id' => $input['employee_id']])->first();
        if ($employee != null) {
            Flash::success('Chấm công cho nhân viên ' . $employee->name . ' ngày ' . date('d-m-Y', time()) . ' đã hoàn thành.');

            return redirect(route('attendances.index'));
        } else {
            Flash::error('nhân viên ' . $employee->name . ' đã nghỉ việc.');
            return redirect(route('attendance-create-additional'));
        }


    }

    /**
     * Display the specified Attendance.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Attendance $attendance */
        $attendance = Attendance::find($id);

        if (empty($attendance)) {
            Flash::error('Không tìm thấy nhật ký chấm công này.');

            return redirect(route('attendances.index'));
        }

        return view('attendances.show')->with('attendance', $attendance);
    }

    /**
     * Show the form for editing the specified Attendance.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Attendance $attendance */
        $attendance = Attendance::find($id);
        if (empty($attendance)) {
            Flash::error('Không tìm thấy nhật ký chấm công này.');

            return redirect(route('attendances.index'));
        }

        return view('attendances.edit')->with('attendance', $attendance);
    }

    /**
     * Update the specified Attendance in storage.
     *
     * @param int $id
     * @param UpdateAttendanceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAttendanceRequest $request)
    {
        /** @var Attendance $attendance */
        $attendance = Attendance::find($id);

        if (empty($attendance)) {
            Flash::error('Không tìm thấy nhật ký chấm công này.');

            return redirect(route('attendances.index'));
        }

        $attendance->fill($request->all());
        $attendance->save();

        Flash::success('Cập nhật chấm công thành công.');

        return redirect(route('attendances.index'));
    }

    /**
     * Remove the specified Attendance from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var Attendance $attendance */
        $attendance = Attendance::find($id);

        if (empty($attendance)) {
            Flash::error('Attendance not found');

            return redirect(route('attendances.index'));
        }

        $attendance->delete();

        Flash::success('Attendance deleted successfully.');

        return redirect(route('attendances.index'));
    }
}
