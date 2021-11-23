<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCheckoutOrderRequest;
use App\Http\Requests\UpdateCheckoutOrderRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\CheckoutOrder;
use App\Models\Menu;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class CheckoutOrderController extends AppBaseController
{
    /**
     * Display a listing of the CheckoutOrder.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var CheckoutOrder $checkoutOrders */
        $checkoutOrders = CheckoutOrder::all();

        return view('checkout_orders.index')
            ->with('checkoutOrders', $checkoutOrders);
    }

    /**
     * Show the form for creating a new CheckoutOrder.
     *
     * @return Response
     */
    public function create()
    {
        return view('checkout_orders.create');
    }

    /**
     * Store a newly created CheckoutOrder in storage.
     *
     * @param CreateCheckoutOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateCheckoutOrderRequest $request)
    {
        $input = $request->all();
        $input['user_id']=Auth::id();
        /** @var CheckoutOrder $checkoutOrder */
        $checkoutOrder = CheckoutOrder::create($input);
        $checkoutOrder->bill_code=idGenerator($checkoutOrder->id);
        $checkoutOrder->save();
        Flash::success('Checkout Order saved successfully.');

        return redirect(route('checkoutOrders.index'));
    }

    /**
     * Display the specified CheckoutOrder.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CheckoutOrder $checkoutOrder */
        $checkoutOrder = CheckoutOrder::find($id);

        if (empty($checkoutOrder)) {
            Flash::error('Checkout Order not found');

            return redirect(route('checkoutOrders.index'));
        }

        return view('checkout_orders.show')->with('checkoutOrder', $checkoutOrder);
    }

    /**
     * Show the form for editing the specified CheckoutOrder.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var CheckoutOrder $checkoutOrder */
        $checkoutOrder = CheckoutOrder::find($id);

        if (empty($checkoutOrder)) {
            Flash::error('Checkout Order not found');

            return redirect(route('checkoutOrders.index'));
        }

        return view('checkout_orders.edit')->with('checkoutOrder', $checkoutOrder);
    }

    /**
     * Update the specified CheckoutOrder in storage.
     *
     * @param int $id
     * @param UpdateCheckoutOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCheckoutOrderRequest $request)
    {
        /** @var CheckoutOrder $checkoutOrder */
        $checkoutOrder = CheckoutOrder::find($id);

        if (empty($checkoutOrder)) {
            Flash::error('Checkout Order not found');

            return redirect(route('checkoutOrders.index'));
        }

        $checkoutOrder->fill($request->all());
        $checkoutOrder->save();

        Flash::success('Checkout Order updated successfully.');

        return redirect(route('checkoutOrders.index'));
    }

    /**
     * Remove the specified CheckoutOrder from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CheckoutOrder $checkoutOrder */
        $checkoutOrder = CheckoutOrder::find($id);

        if (empty($checkoutOrder)) {
            Flash::error('Checkout Order not found');

            return redirect(route('checkoutOrders.index'));
        }

        $checkoutOrder->delete();

        Flash::success('Checkout Order deleted successfully.');

        return redirect(route('checkoutOrders.index'));
    }
    public function getMenuPrice(Request $request){
        $id=$request['id'];
        $menu=Menu::where(['id'=>$id])->first();
        return json_encode($menu);
    }
}
