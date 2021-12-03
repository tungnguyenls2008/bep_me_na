<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Tên cửa hàng:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
<!-- Db Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('db_name', 'Tên đăng nhập:') !!}
    {!! Form::text('db_name', null, ['class' => 'form-control','maxlength' => 24,'maxlength' => 24]) !!}
</div>
<!-- Logo Field -->
<div class="form-group col-sm-12">
    {!! Form::label('logo', 'Ảnh đại diện:') !!}
    {!! Form::file('logo', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

