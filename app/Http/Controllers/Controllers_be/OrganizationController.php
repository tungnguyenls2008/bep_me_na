<?php

namespace App\Http\Controllers\Controllers_be;

use App\Http\Requests\CreateOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Models_be\Organization;
use App\Models\Models_be\Profile;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
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
            $input['logo'] = $image->move('img/organization_logos', $input['name'] . '.' . $image->getClientOriginalExtension())->getPathname();
        }
        $profile = Profile::create(['name' => $input['name']]);
        $input['profile_id'] = $profile->id;
        /** @var Organization $organization */
        $organization = Organization::create($input);
        cloneCoreDb($input['db_name']);

        //Artisan::call('db:create ' . $input['db_name']);
        Flash::success('Khởi tạo cửa hàng thành công.');

        return redirect(route('login'));
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
}
