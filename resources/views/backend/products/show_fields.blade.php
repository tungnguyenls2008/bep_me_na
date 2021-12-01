<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $product->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $product->description }}</p>
</div>

<!-- Industry Id Field -->
<div class="col-sm-12">
    {!! Form::label('industry_id', 'Industry Id:') !!}
    <p>{{ $product->industry_id }}</p>
</div>

