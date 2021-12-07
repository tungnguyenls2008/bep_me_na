<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Provider;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProviderController extends AppBaseController
{
    /**
     * Display a listing of the Provider.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Provider $providers */
        $providers = Provider::all();

        return view('providers.index')
            ->with('providers', $providers);
    }

    /**
     * Show the form for creating a new Provider.
     *
     * @return Response
     */
    public function create()
    {
        return view('providers.create');
    }

    /**
     * Store a newly created Provider in storage.
     *
     * @param CreateProviderRequest $request
     *
     * @return Response
     */
    public function store(CreateProviderRequest $request)
    {
        $input = $request->all();

        /** @var Provider $provider */
        $provider = new Provider();
        $provider->fill($input);
        $provider->save();

        Flash::success('Provider saved successfully.');

        return redirect(route('providers.index'));
    }

    /**
     * Display the specified Provider.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Provider $provider */
        $provider = Provider::find($id);

        if (empty($provider)) {
            Flash::error('Provider not found');

            return redirect(route('providers.index'));
        }

        return view('providers.show')->with('provider', $provider);
    }

    /**
     * Show the form for editing the specified Provider.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Provider $provider */
        $provider = Provider::find($id);

        if (empty($provider)) {
            Flash::error('Provider not found');

            return redirect(route('providers.index'));
        }

        return view('providers.edit')->with('provider', $provider);
    }

    /**
     * Update the specified Provider in storage.
     *
     * @param int $id
     * @param UpdateProviderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProviderRequest $request)
    {
        /** @var Provider $provider */
        $provider = Provider::find($id);

        if (empty($provider)) {
            Flash::error('Provider not found');

            return redirect(route('providers.index'));
        }

        $provider->fill($request->all());
        $provider->save();

        Flash::success('Provider updated successfully.');

        return redirect(route('providers.index'));
    }

    /**
     * Remove the specified Provider from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Provider $provider */
        $provider = Provider::find($id);

        if (empty($provider)) {
            Flash::error('Provider not found');

            return redirect(route('providers.index'));
        }

        $provider->delete();

        Flash::success('Provider deleted successfully.');

        return redirect(route('providers.index'));
    }
    public function toggleStatus(Request $request)
    {
        $order = Provider::find($request->id);
        if ($order->status == 0) {
            $order->status = 1;
        } elseif ($order->status == 1) {
            $order->status = 0;
        }

        if ($order->save()) {
            Flash::success('Chuyển đổi trạng thái nhà cung cấp thành công!');
            return redirect(route('providers.index'));
        }
    }
}
