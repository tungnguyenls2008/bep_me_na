<!-- Bill Code Field -->
<div class="col-sm-12">
    {!! Form::label('bill_code', 'Bill Code:') !!}
    <p>{{ $checkoutOrder->bill_code }}</p>
</div>

<!-- Menu Id Field -->
<div class="col-sm-12">
    {!! Form::label('menu_id', 'Menu Id:') !!}
    <p>{{ $checkoutOrder->menu_id }}</p>
</div>

<!-- Quantity Field -->
<div class="col-sm-12">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{{ $checkoutOrder->quantity }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $checkoutOrder->price }}</p>
</div>

<!-- Type Field -->
<div class="col-sm-12">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $checkoutOrder->type }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $checkoutOrder->user_id }}</p>
</div>

