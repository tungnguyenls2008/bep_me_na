<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 120,'maxlength' => 120]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500]) !!}
</div>

<!-- Industry Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('industry_id', 'Industry Id:') !!}
    {!! Form::number('industry_id', null, ['class' => 'form-control']) !!}
</div>