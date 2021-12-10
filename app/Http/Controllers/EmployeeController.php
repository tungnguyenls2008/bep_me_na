<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Employee;
use Illuminate\Http\Request;
use Flash;
use Response;

class EmployeeController extends AppBaseController
{
    /**
     * Display a listing of the Employee.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Employee $employees */
        $employees = Employee::all();
        if ($employees->isEmpty()) {
            Flash::warning('Bạn chưa đăng ký thông tin nhân viên.');
        }
        return view('employees.index')
            ->with('employees', $employees);
    }

    /**
     * Show the form for creating a new Employee.
     *
     * @return Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created Employee in storage.
     *
     * @param CreateEmployeeRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        $input = $request->all();
        /** @var Employee $employee */
        $employee = new Employee();
        $employee->fill($input);
        $employee->save();

        Flash::success('Employee saved successfully.');

        return redirect(route('employees.index'));
    }

    /**
     * Display the specified Employee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Employee $employee */
        $employee = Employee::find($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        return view('employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified Employee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Employee $employee */
        $employee = Employee::find($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        return view('employees.edit')->with('employee', $employee);
    }

    /**
     * Update the specified Employee in storage.
     *
     * @param int $id
     * @param UpdateEmployeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeRequest $request)
    {
        /** @var Employee $employee */
        $employee = Employee::find($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        $employee->fill($request->all());
        $employee->save();

        Flash::success('Employee updated successfully.');

        return redirect(route('employees.index'));
    }

    /**
     * Remove the specified Employee from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Employee $employee */
        $employee = Employee::find($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        $employee->delete();

        Flash::success('Employee deleted successfully.');

        return redirect(route('employees.index'));
    }
    public function toggleStatus(Request $request)
    {
        $order = Employee::find($request->id);
        if ($order->status == 0) {
            $order->status = 1;
        } elseif ($order->status == 1) {
            $order->status = 0;
        }

        if ($order->save()) {
            Flash::success('Chuyển đổi trạng thái nhân viên thành công!');
            return redirect(route('employees.index'));
        }
    }
}
