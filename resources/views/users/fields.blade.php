<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Tên') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Mật khẩu') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Confirmation Password Field -->
<div class="form-group col-sm-6">
      {!! Form::label('password', 'Xác nhận mật khẩu') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>
<!-- Permission Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permissions', 'Phân quyền') !!}
    {!! Form::select('permissions[]',[
    1=>'Quản lý sản phẩm',
    2=>'Quản lý doanh thu',
    3=>'Quản lý chi phí',
    4=>'Quản trị nhân sự',
], null,['class' => 'form-control','multiple'=>true]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
