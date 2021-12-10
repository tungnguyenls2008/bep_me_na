<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Position;
use Illuminate\Http\Request;
use Flash;
use Response;

class PositionController extends AppBaseController
{
    /**
     * Display a listing of the Position.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Position $positions */
        $positions = Position::all();
        if ($positions->isEmpty()) {
            Flash::warning('Bạn chưa tạo vị trí làm việc.');
        }
        return view('positions.index')
            ->with('positions', $positions);
    }

    /**
     * Show the form for creating a new Position.
     *
     * @return Response
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Store a newly created Position in storage.
     *
     * @param CreatePositionRequest $request
     *
     * @return Response
     */
    public function store(CreatePositionRequest $request)
    {
        $input = $request->all();

        /** @var Position $position */
        $position = new Position();
        $position->fill($input);
        $position->save();

        Flash::success('Position saved successfully.');

        return redirect(route('positions.index'));
    }

    /**
     * Display the specified Position.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Position $position */
        $position = Position::find($id);

        if (empty($position)) {
            Flash::error('Position not found');

            return redirect(route('positions.index'));
        }

        return view('positions.show')->with('position', $position);
    }

    /**
     * Show the form for editing the specified Position.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Position $position */
        $position = Position::find($id);

        if (empty($position)) {
            Flash::error('Position not found');

            return redirect(route('positions.index'));
        }

        return view('positions.edit')->with('position', $position);
    }

    /**
     * Update the specified Position in storage.
     *
     * @param int $id
     * @param UpdatePositionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePositionRequest $request)
    {
        /** @var Position $position */
        $position = Position::find($id);

        if (empty($position)) {
            Flash::error('Position not found');

            return redirect(route('positions.index'));
        }

        $position->fill($request->all());
        $position->save();

        Flash::success('Position updated successfully.');

        return redirect(route('positions.index'));
    }

    /**
     * Remove the specified Position from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
//        /** @var Position $position */
//        $position = Position::find($id);
//
//        if (empty($position)) {
//            Flash::error('Position not found');
//
//            return redirect(route('positions.index'));
//        }
//
//        $position->delete();
//
//        Flash::success('Position deleted successfully.');
//
//        return redirect(route('positions.index'));
    }
    public function toggleStatus(Request $request)
    {
        $order = Position::find($request->id);
        if ($order->status == 0) {
            $order->status = 1;
        } elseif ($order->status == 1) {
            $order->status = 0;
        }

        if ($order->save()) {
            Flash::success('Chuyển đổi trạng thái vị trí làm việc thành công!');
            return redirect(route('positions.index'));
        }
    }
}
