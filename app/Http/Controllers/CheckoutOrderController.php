<?php

namespace App\Http\Controllers;

use App\Exports\CheckoutOrderExport;
use App\Http\Requests\CreateCheckoutOrderRequest;
use App\Http\Requests\UpdateCheckoutOrderRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\CheckoutOrder;
use App\Models\Menu;
use App\Models\Note;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Response;

class CheckoutOrderController extends AppBaseController
{
    /**
     * Display a listing of the CheckoutOrder.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index(Request $request)
    {
        /** @var CheckoutOrder $checkoutOrders */
        $checkoutOrders = CheckoutOrder::OrderBy('created_at','desc')->paginate(15);


        return view('checkout_orders.index')
            ->with('checkoutOrders', $checkoutOrders);
    }
//    public function search(Request $request)
//    {
//        $search=$request->post();
//
//        $checkoutOrders= CheckoutOrder::OrderBy('created_at','desc');
//        if (isset($search['bill_code'])){
//            $checkoutOrders->where('bill_code','like','%'.$search['bill_code'].'%');
//        }
//        $checkoutOrders->paginate(15);
//        return view('checkout_orders.index')
//            ->with('checkoutOrders', $checkoutOrders);
//    }

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
        $input['menu_id']=json_encode($input['menu_id']);

        foreach ($input['price'] as $key=>$item){
            if ($item!=0){
                $input['type'][$key]=0;
            }else{
                $input['type'][$key]=1;
            }
        }
        ksort($input['type']);
        $input['type']=json_encode($input['type']);
        $input['quantity']=json_encode($input['quantity']);
        $input['price']=json_encode($input['price']);
        $input['user_id']=Auth::id();
        $last_order= CheckoutOrder::latest()->first();
        if ($last_order==null){
            $input['bill_code']=idGenerator(1);
        }else{
            $input['bill_code']=idGenerator($last_order->id+1);
        }
        if (isset($input['note'])){
            $new_note['bill_code']=$input['bill_code'];
            $new_note['content']=$input['note'];
            $note= Note::create($new_note);
        }
        $checkoutOrder = CheckoutOrder::create($input);

        Flash::success('Lưu hóa đơn thành công!');

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
//        /** @var CheckoutOrder $checkoutOrder */
//        $checkoutOrder = CheckoutOrder::find($id);
//
//        if (empty($checkoutOrder)) {
//            Flash::error('Checkout Order not found');
//
//            return redirect(route('checkoutOrders.index'));
//        }
//
//        return view('checkout_orders.edit')->with('checkoutOrder', $checkoutOrder);
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
//        /** @var CheckoutOrder $checkoutOrder */
//        $checkoutOrder = CheckoutOrder::find($id);
//
//        if (empty($checkoutOrder)) {
//            Flash::error('Checkout Order not found');
//
//            return redirect(route('checkoutOrders.index'));
//        }
//
//        $checkoutOrder->fill($request->all());
//        $checkoutOrder->save();
//
//        Flash::success('Checkout Order updated successfully.');
//
//        return redirect(route('checkoutOrders.index'));
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
    public function export()
    {
        return Excel::download(new CheckoutOrderExport(), 'bills.xlsx');
    }
    public function createNote(Request $request){
        $input=$request->all();
        $note= Note::create($input);
        Flash::success('Tạo ghi chú thành công');
        $checkoutOrders = CheckoutOrder::OrderBy('created_at','desc')->paginate(15);


        return view('checkout_orders.index')
            ->with('checkoutOrders', $checkoutOrders);
    }
    public function updateNote(Request $request){
        $input=$request->all();

        $note= Note::find($input['note-id']);
        $note->content=$input['content'];
        $note->update();
        Flash::success('Cập nhật ghi chú thành công');
        $checkoutOrders = CheckoutOrder::OrderBy('created_at','desc')->paginate(15);


        return view('checkout_orders.index')
            ->with('checkoutOrders', $checkoutOrders);
    }
}
