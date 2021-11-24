<?php
?>
<div class="col-sm-3">
    {!! Form::model($checkoutOrders, ['route' => 'search','method'=>'post']) !!}
    <input type="text" id="bill_code" name="bill_code" placeholder="Tìm mã hóa đơn..." class="form-control" style="width: auto" >
{{--    <input type="date" id="created_at" name="created_at" placeholder="Tìm theo ngày..." class="form-control" style="width: auto" >--}}
        <button type="submit">Tìm kiếm</button>
    <a href="{{route('checkoutOrders.index')}}"> Hủy</a>
    {!! Form::close() !!}
</div>
