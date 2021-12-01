<?php

namespace App\Http\Controllers\Controllers_be;

use App\Http\Requests\CreateCeoRequest;
use App\Http\Requests\UpdateCeoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Models_be\Ceo;
use Illuminate\Http\Request;
use Flash;
use Response;

class CeoController extends AppBaseController
{
    /**
     * Display a listing of the Ceo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Ceo $ceos */
        $ceos = Ceo::all();

        return view('backend.ceos.index')
            ->with('ceos', $ceos);
    }

    /**
     * Show the form for creating a new Ceo.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.ceos.create');
    }

    /**
     * Store a newly created Ceo in storage.
     *
     * @param CreateCeoRequest $request
     *
     * @return Response
     */
    public function store(CreateCeoRequest $request)
    {
        $input = $request->all();

        /** @var Ceo $ceo */
        $ceo = Ceo::create($input);

        Flash::success('Ceo saved successfully.');

        return redirect(route('ceos.index'));
    }

    /**
     * Display the specified Ceo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Ceo $ceo */
        $ceo = Ceo::find($id);

        if (empty($ceo)) {
            Flash::error('Ceo not found');

            return redirect(route('ceos.index'));
        }

        return view('backend.ceos.show')->with('ceo', $ceo);
    }

    /**
     * Show the form for editing the specified Ceo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Ceo $ceo */
        $ceo = Ceo::find($id);

        if (empty($ceo)) {
            Flash::error('Ceo not found');

            return redirect(route('ceos.index'));
        }

        return view('backend.ceos.edit')->with('ceo', $ceo);
    }

    /**
     * Update the specified Ceo in storage.
     *
     * @param int $id
     * @param UpdateCeoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCeoRequest $request)
    {
        /** @var Ceo $ceo */
        $ceo = Ceo::find($id);

        if (empty($ceo)) {
            Flash::error('Ceo not found');

            return redirect(route('ceos.index'));
        }

        $ceo->fill($request->all());
        $ceo->save();

        Flash::success('Ceo updated successfully.');

        return redirect(route('ceos.index'));
    }

    /**
     * Remove the specified Ceo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Ceo $ceo */
        $ceo = Ceo::find($id);

        if (empty($ceo)) {
            Flash::error('Ceo not found');

            return redirect(route('ceos.index'));
        }

        $ceo->delete();

        Flash::success('Ceo deleted successfully.');

        return redirect(route('ceos.index'));
    }
}
