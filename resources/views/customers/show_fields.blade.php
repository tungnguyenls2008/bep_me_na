<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $customer->name }}</p>
</div>

<!-- Phone Field -->
<div class="col-sm-12">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{{ $customer->phone }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $customer->address }}</p>
</div>

<!-- Dob Field -->
<div class="col-sm-12">
    {!! Form::label('dob', 'Dob:') !!}
    <p>{{ $customer->dob }}</p>
</div>

<!-- Favorites Field -->
<div class="col-sm-12">
    {!! Form::label('favorites', 'Favorites:') !!}
    <p>{{ $customer->favorites }}</p>
</div>

<!-- Note Field -->
<div class="col-sm-12">
    {!! Form::label('note', 'Note:') !!}
    <p>{{ $customer->note }}</p>
</div>

