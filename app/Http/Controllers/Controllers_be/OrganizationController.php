<?php

namespace App\Http\Controllers\Controllers_be;

use App\Http\Requests\CreateOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Models_be\Organization;
use App\Models\Models_be\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Response;

class OrganizationController extends AppBaseController
{
    /**
     * Display a listing of the Organization.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index(Request $request)
    {
        /** @var Organization $organizations */
        $organizations = Organization::all();

        return view('backend.organizations.index')
            ->with('organizations', $organizations);
    }

    /**
     * Show the form for creating a new Organization.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.organizations.create');
    }

    /**
     * Store a newly created Organization in storage.
     *
     * @param CreateOrganizationRequest $request
     *
     * @return Response
     */
    public function store(CreateOrganizationRequest $request)
    {
        $input = $request->all();
        $input['licence'] = uniqidReal(36);
        if ($request->file('logo') !== null) {
            $image = $request->file('logo');
            $image->move('img/organization_logos', $input['db_name'] . '.' . $image->getClientOriginalExtension())->getPathname();
            $input['logo']='img/organization_logos/'.$input['db_name'] . '.' . $image->getClientOriginalExtension();
        }
        $profile = Profile::create(['name' => $input['name']]);
        $input['profile_id'] = $profile->id;
        /** @var Organization $organization */
        $organization = Organization::create($input);
        cloneCoreDb($input['db_name']);

        $rules = [
            'ceo_name' => 'required',
            'ceo_email'    => 'required',
            'ceo_password' => 'required',
        ];
        $input_ceo     = $request->only('ceo_name', 'ceo_email','ceo_password','ceo_password_confirmation');
        $validation = Validator::make( $input_ceo, $rules );
        if ( $validation->fails() ) {
            return redirect(route('organization-register'));
        }
        if ($input_ceo['ceo_password']==$input_ceo['ceo_password_confirmation']){
            $input_ceo['name']=$input_ceo['ceo_name'];
            $input_ceo['email']=$input_ceo['ceo_email'];
            $input_ceo['password']=Hash::make($input_ceo['ceo_password']);
            $input_ceo['is_ceo']=1;
            $user= (new \App\Models\User)->setConnection($input['db_name']);
            $user->create($input_ceo);
            $user=(new \App\Models\User)->setConnection($input['db_name'])->where(['is_ceo'=>1])->first();
            $organization=Organization::withoutTrashed()->where(['db_name'=>$input['db_name']])->first();
            $organization->ceo_id=$user->id;
            $organization->save();
        }

        //Artisan::call('db:create ' . $input['db_name']);
        Flash::success('Khởi tạo cửa hàng thành công.');

        return redirect(route('organization'));
    }

    /**
     * Display the specified Organization.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Organization $organization */
        $organization = Organization::find($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('backend.organizations.index'));
        }

        return view('backend.organizations.show')->with('organization', $organization);
    }

    /**
     * Show the form for editing the specified Organization.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Organization $organization */
        $organization = Organization::find($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        return view('backend.organizations.edit')->with('organization', $organization);
    }

    /**
     * Update the specified Organization in storage.
     *
     * @param int $id
     * @param UpdateOrganizationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrganizationRequest $request)
    {
        /** @var Organization $organization */
        $organization = Organization::find($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        $organization->fill($request->all());
        $organization->save();

        Flash::success('Organization updated successfully.');

        return redirect(route('organizations.index'));
    }

    /**
     * Remove the specified Organization from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var Organization $organization */
        $organization = Organization::find($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        $organization->delete();

        Flash::success('Organization deleted successfully.');

        return redirect(route('organizations.index'));
    }
    public function organizationCheck(Request $request): bool
    {
        $db_name=$request->get('organization_id');
        $organization=Organization::withoutTrashed()->where(['db_name'=>$db_name])->first();
        if ($organization!=null){
            $connection= $organization->toArray();
            Session::put('connection',$connection);
            return true;
        }else{
            return false;
        }
    }
}
