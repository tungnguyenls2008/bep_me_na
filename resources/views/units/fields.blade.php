<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Đơn vị tính:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 24,'maxlength' => 24]) !!}
</div>
<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Mô tả:') !!}
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>
