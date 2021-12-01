<?php

namespace App\Http\Controllers\Controllers_be;

use App\Http\Requests\CreateIndustryRequest;
use App\Http\Requests\UpdateIndustryRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Models_be\Industry;
use Illuminate\Http\Request;
use Flash;
use Response;

class IndustryController extends AppBaseController
{
    /**
     * Display a listing of the Industry.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Industry $industries */
        $industries = Industry::all();

        return view('backend.industries.index')
            ->with('industries', $industries);
    }

    /**
     * Show the form for creating a new Industry.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.industries.create');
    }

    /**
     * Store a newly created Industry in storage.
     *
     * @param CreateIndustryRequest $request
     *
     * @return Response
     */
    public function store(CreateIndustryRequest $request)
    {
        $input = $request->all();

        /** @var Industry $industry */
        $industry = Industry::create($input);

        Flash::success('Industry saved successfully.');

        return redirect(route('industries.index'));
    }

    /**
     * Display the specified Industry.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Industry $industry */
        $industry = Industry::find($id);

        if (empty($industry)) {
            Flash::error('Industry not found');

            return redirect(route('industries.index'));
        }

        return view('backend.industries.show')->with('industry', $industry);
    }

    /**
     * Show the form for editing the specified Industry.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Industry $industry */
        $industry = Industry::find($id);

        if (empty($industry)) {
            Flash::error('Industry not found');

            return redirect(route('industries.index'));
        }

        return view('backend.industries.edit')->with('industry', $industry);
    }

    /**
     * Update the specified Industry in storage.
     *
     * @param int $id
     * @param UpdateIndustryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIndustryRequest $request)
    {
        /** @var Industry $industry */
        $industry = Industry::find($id);

        if (empty($industry)) {
            Flash::error('Industry not found');

            return redirect(route('industries.index'));
        }

        $industry->fill($request->all());
        $industry->save();

        Flash::success('Industry updated successfully.');

        return redirect(route('industries.index'));
    }

    /**
     * Remove the specified Industry from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Industry $industry */
        $industry = Industry::find($id);

        if (empty($industry)) {
            Flash::error('Industry not found');

            return redirect(route('industries.index'));
        }

        $industry->delete();

        Flash::success('Industry deleted successfully.');

        return redirect(route('industries.index'));
    }
}
