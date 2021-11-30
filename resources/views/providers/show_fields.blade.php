<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Tên:') !!}
    <p>{{ $provider->name }}</p>
</div>

<!-- Phone Field -->
<div class="col-sm-12">
    {!! Form::label('phone', 'Số điện thoại:') !!}
    <p>{{ $provider->phone }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Địa chỉ:') !!}
    <p>{{ $provider->address }}</p>
</div>

<!-- Note Field -->
<div class="col-sm-12">
    {!! Form::label('note', 'Ghi chú:') !!}
    <p>{{ $provider->note }}</p>
</div>

<!-- Count Field -->
<div class="col-sm-12">
    {!! Form::label('count', 'Số lần giao dịch:') !!}
    <p>{{ $provider->count }}</p>
</div>
