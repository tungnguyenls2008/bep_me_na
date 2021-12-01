<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Ceo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ceo_id', 'Ceo Id:') !!}
    {!! Form::number('ceo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Licence Field -->
<div class="form-group col-sm-6">
    {!! Form::label('licence', 'Licence:') !!}
    {!! Form::text('licence', null, ['class' => 'form-control','maxlength' => 24,'maxlength' => 24]) !!}
</div>

<!-- Db Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('db_name', 'Db Name:') !!}
    {!! Form::text('db_name', null, ['class' => 'form-control','maxlength' => 24,'maxlength' => 24]) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::number('status', null, ['class' => 'form-control']) !!}
</div>