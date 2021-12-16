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
<?php
$roles=\App\Models\Models_be\Role::withoutTrashed()->get();
$role_select=[];
foreach ($roles as $role){
    $role_select[$role->id]=$role->description;
}
?>
<div class="form-group col-sm-6">
    {!! Form::label('permissions', 'Phân quyền') !!}
    {!! Form::select('permissions[]',$role_select, 8,['class' => 'form-control','multiple'=>true]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
