<?php

namespace App\Http\Controllers;

use App\Exports\SpendingExport;
use App\Http\Requests\CreateRawMaterialImportRequest;
use App\Http\Requests\UpdateRawMaterialImportRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\RawMaterialImport;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Response;

class RawMaterialImportController extends AppBaseController
{
    /**
     * Display a listing of the RawMaterialImport.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var RawMaterialImport $rawMaterialImports */
        $rawMaterialImports = RawMaterialImport::all();

        return view('raw_material_imports.index')
            ->with('rawMaterialImports', $rawMaterialImports);
    }

    /**
     * Show the form for creating a new RawMaterialImport.
     *
     * @return Response
     */
    public function create()
    {
        return view('raw_material_imports.create');
    }

    /**
     * Store a newly created RawMaterialImport in storage.
     *
     * @param CreateRawMaterialImportRequest $request
     *
     * @return Response
     */
    public function store(CreateRawMaterialImportRequest $request)
    {
        $input = $request->all();
        $input['total']=$input['quantity']*$input['price'];
        $input['user_id']=Auth::id();
        /** @var RawMaterialImport $rawMaterialImport */
        $rawMaterialImport = RawMaterialImport::create($input);

        Flash::success('Raw Material Import saved successfully.');

        return redirect(route('rawMaterialImports.index'));
    }

    /**
     * Display the specified RawMaterialImport.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RawMaterialImport $rawMaterialImport */
        $rawMaterialImport = RawMaterialImport::find($id);

        if (empty($rawMaterialImport)) {
            Flash::error('Raw Material Import not found');

            return redirect(route('rawMaterialImports.index'));
        }

        return view('raw_material_imports.show')->with('rawMaterialImport', $rawMaterialImport);
    }

    /**
     * Show the form for editing the specified RawMaterialImport.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var RawMaterialImport $rawMaterialImport */
        $rawMaterialImport = RawMaterialImport::find($id);

        if (empty($rawMaterialImport)) {
            Flash::error('Raw Material Import not found');

            return redirect(route('rawMaterialImports.index'));
        }

        return view('raw_material_imports.edit')->with('rawMaterialImport', $rawMaterialImport);
    }

    /**
     * Update the specified RawMaterialImport in storage.
     *
     * @param int $id
     * @param UpdateRawMaterialImportRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRawMaterialImportRequest $request)
    {
        /** @var RawMaterialImport $rawMaterialImport */
        $rawMaterialImport = RawMaterialImport::find($id);
        $input=$request->all();
        $input['total']=$input['quantity']*$input['price'];

        if (empty($rawMaterialImport)) {
            Flash::error('Raw Material Import not found');

            return redirect(route('rawMaterialImports.index'));
        }
        if (Auth::id()==$rawMaterialImport->user_id) {
            $rawMaterialImport->fill($input);
            $rawMaterialImport->save();

            Flash::success('Cập nhật thành công khoản chi '.$rawMaterialImport->name.'.');

            return redirect(route('rawMaterialImports.index'));
        }else{
            Flash::error('Bạn không có quyền cập nhật khoản chi này.');

            return redirect(route('rawMaterialImports.index'));
        }

    }

    /**
     * Remove the specified RawMaterialImport from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RawMaterialImport $rawMaterialImport */
        $rawMaterialImport = RawMaterialImport::find($id);

        if (empty($rawMaterialImport)) {
            Flash::error('Raw Material Import not found');

            return redirect(route('rawMaterialImports.index'));
        }
        if (Auth::id()==$rawMaterialImport->user_id) {
            $rawMaterialImport->delete();

            Flash::success('Xóa thành công khoản chi '.$rawMaterialImport->name.'.');

            return redirect(route('rawMaterialImports.index'));
        }else{
            Flash::error('Bạn không có quyền xóa khoản chi này.');

            return redirect(route('rawMaterialImports.index'));
        }

    }
    public function export()
    {
        return Excel::download(new SpendingExport(), 'thong-ke-chi-phi-'.date('d-m-Y',time()).'.xlsx');
    }
}
