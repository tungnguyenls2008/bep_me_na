<?php

namespace App\Http\Controllers;

use App\Exports\SpendingExport;
use App\Http\Requests\CreateRawMaterialImportRequest;
use App\Http\Requests\UpdateRawMaterialImportRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Provider;
use App\Models\RawMaterialImport;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
        $rawMaterialImports = RawMaterialImport::where(['deleted_at'=>null])->OrderBy('created_at','desc')->get();

        return view('raw_material_imports.index')
            ->with('rawMaterialImports', $rawMaterialImports);
    }
    public function search(Request $request)
    {
        $search=$request->post();
        $spending= RawMaterialImport::where(['deleted_at'=>null])->OrderBy('created_at','desc');

        if (isset($search['create_from'])|| isset($search['create_to'])){
            if (!isset($search['create_from'])){
                $search['create_from']='1970-01-01';
            }
            if (!isset($search['create_to'])){
                $search['create_to']='2100-12-31';
            }
            $from=date('Y-m-d H:i:s',strtotime($search['create_from'].' 00:00:00'));
            $to=date('Y-m-d H:i:s',strtotime($search['create_to'].' 23:23:59'));
            $spending->whereBetween('created_at',[$from,$to]);
        }
        if (isset($search['status'])){
            $spending->where(['status'=>$search['status']]);
        }
        if (isset($search['name'])){
            $spending->where('name','like','%'.$search['name'].'%');
        }
        if (isset($search['user_id'])){
            $spending->where(['user_id'=>$search['user_id']]);
        }
        if (isset($search['provider_id'])){
            $spending->where(['provider_id'=>$search['provider_id']]);
        }
        $spending=$spending->paginate(15);
        return view('raw_material_imports.index')
            ->with('rawMaterialImports', $spending,)->with('count',$spending->total());
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
        if ($input['provider_id']!=null){
            $provider=Provider::find($input['provider_id']);
            $provider->count+=1;
            $provider->save();
        }
        $last_import = RawMaterialImport::latest()->first();
        if ($last_import == null) {
            $input['bill_code'] = idGenerator('IMPORT',1);
        } else {
            $input['bill_code'] = idGenerator('IMPORT',$last_import->id + 1);
        }
        if ($request->file('proof') !== null) {
            $image = $request->file('proof');
            $image->move('img/import_proofs/'.Session::get('connection')['db_name'].'/', $input['bill_code']. '.png')->getPathname();
            $input['proof']='img/import_proofs/'.Session::get('connection')['db_name'].'/'.$input['bill_code'] . '.png';

        }
        /** @var RawMaterialImport $rawMaterialImport */
        $rawMaterialImport = new RawMaterialImport();
        $rawMaterialImport->fill($input);
        $rawMaterialImport->save();

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
        if (Auth::id()==$rawMaterialImport->user_id||Auth::user()->is_ceo==1) {
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
        if (Auth::id()==$rawMaterialImport->user_id||Auth::user()->is_ceo==1) {
            if ($rawMaterialImport->provider_id!=null){
                $provider=Provider::find($rawMaterialImport->provider_id);
                $provider->count-=1;
                $provider->save();
            }
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
    public function toggleStatus(Request $request){
        $order=RawMaterialImport::find($request->id);
        if ($order->status==0){
            $order->status=1;
        }elseif ($order->status==1){
            $order->status=0;
        }
        if(Auth::id()==$order->user_id||Auth::user()->is_ceo==1){
            if($order->save()){
                Flash::success('Chuyển đổi trạng thái khoản chi thành công!');
                return redirect(route('rawMaterialImports.index'));
            }
        }
        else{
            Flash::error('Bạn không có quyền chuyển đổi trạng thái khoản chi này!');
            return redirect(route('rawMaterialImports.index'));
        }

    }
}
