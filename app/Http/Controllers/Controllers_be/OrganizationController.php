<?php

namespace App\Http\Controllers\Controllers_be;

use App\Http\Requests\CreateOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Models_be\Organization;
use Illuminate\Http\Request;
use Flash;
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

        /** @var Organization $organization */
        $organization = Organization::create($input);

        Flash::success('Organization saved successfully.');

        return redirect(route('backend.organizations.index'));
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
     * @throws \Exception
     *
     * @return Response
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
