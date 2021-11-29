<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Tên:') !!}
    <p>{{ $customer->name }}</p>
</div>

<!-- Phone Field -->
<div class="col-sm-12">
    {!! Form::label('phone', 'Số điện thoại:') !!}
    <p>{{ $customer->phone }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Địa chỉ:') !!}
    <p>{{ $customer->address }}</p>
</div>

<!-- Dob Field -->
<div class="col-sm-12">
    {!! Form::label('dob', 'Ngày sinh:') !!}
    <p>{{ date('d-m-Y',strtotime($customer->dob)) }}</p>
</div>

<!-- Favorites Field -->
<div class="col-sm-12">
    {!! Form::label('favorites', 'Món ưa thích:') !!}
    <?php
    $favorites = json_decode($customer->favorites, true);
    $menu = \App\Models\Menu::find($favorites);
    ?>
        @foreach($menu as $item)
            <div class="badge badge-pill badge-danger">{{$item->name}}</div>
        @endforeach

</div>
<!-- Count Field -->
<div class="col-sm-12">
    {!! Form::label('order_count', 'Số lần Order:') !!}
    <p>{{ $customer->order_count }} lần</p>
</div>
<!-- Note Field -->
<div class="col-sm-12">
    {!! Form::label('note', 'Ghi chú:') !!}
    <p>{{ $customer->note }}</p>
</div>

