<div class="row">
    <h3>CHI TIẾT DOANH THU</h3>
</div>
<div class="table-responsive">
    <table class="table" id="checkoutOrders-table">
        <thead>
        <tr>
            <th><b>Hóa đơn</b></th>
            <th><b>Khách hàng</b></th>
            <th><b>Thành tiền</b></th>
            <th><b>Người tạo</b></th>
            <th><b>Ngày tạo</b></th>
            <th><b>Ghi chú</b></th>
        </tr>
        </thead>
        <tbody>

<?php
$order_sums=0;
?>
        @foreach($checkoutOrders as $checkoutOrder)
            <tr>
                <td>
                    {{ $checkoutOrder->bill_code }}
                </td>
                <td>
                    {{$checkoutOrder->customer_info}}
                </td>
                <?php $menu_ids = json_decode($checkoutOrder->menu_id, true);
                $menu = \App\Models\Menu::find($menu_ids);
                $quantity = json_decode($checkoutOrder->quantity, true);
                $price = json_decode($checkoutOrder->price, true);
                $type = json_decode($checkoutOrder->type, true);

                $total = [];
                for ($i = 0; $i < count($price); $i++) {
                    $total[$i] = $quantity[$i] * $price[$i];
                }
                $order_sums+=array_sum($total);
                ?>
                <td>
                    {{number_format(array_sum($total))}}
                </td>
                <?php $user = \App\Models\User::find($checkoutOrder->user_id);

                ?>
                <td>
                    {{ $user->name }}<br>


                </td>
                <td>
                    {{date('d-m-Y H:i:s',strtotime($checkoutOrder->created_at))}}
                </td>
                <td>
                    <?php
                    $note = \App\Models\Note::where(['bill_code' => $checkoutOrder->bill_code])->first();
                    if ($note != null) {
                        echo $note->content;
                    }
                    ?>
                </td>
            </tr>

        @endforeach
<tr>
    <td></td>
    <td><b>Tổng cộng</b></td>
    <td>{{number_format($order_sums)}}</td>
    <td></td>
    <td></td>
    <td></td>
</tr>
        </tbody>
    </table>
</div>

