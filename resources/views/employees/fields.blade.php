<!-- Name Field -->
<div class="form-group col-sm-3">
    {!! Form::label('name', 'Tên nhân viên:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-3">
    {!! Form::label('phone', 'Số điện thoại:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 16,'maxlength' => 16]) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-3">
    {!! Form::label('address', 'Địa chỉ:') !!}
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500]) !!}
</div>
<?php
$positions=\App\Models\Position::where(['status'=>0])->get();
$position_select=[];
foreach ($positions as $position){
    $position_select[$position->id]=$position->name;
}
?>
<!-- Position Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('position_id', 'Vị trí công việc:') !!}
    {!! Form::select('position_id',$position_select, null, ['class' => 'form-control','placeholder'=>true]) !!}
</div>
<?php
$shift=[
    1=>'Sáng',
    2=>'Trưa',
    3=>'Chiều',
    4=>'Tối',
    5=>'Nửa ngày sáng',
    6=>'Nửa ngày tối',
    7=>'Cả ngày',
]
?>
<!-- Shift Field -->
<div class="form-group col-sm-3">
    {!! Form::label('shift', 'Ca:') !!}
    {!! Form::select('shift',$shift, null, ['class' => 'form-control','placeholder'=>true]) !!}
</div>

<!-- Salary Field -->
<div class="form-group col-sm-3">
    {!! Form::label('salary', 'Lương:') !!}
    {!! Form::number('salary', null, ['class' => 'form-control']) !!}
</div>
<?php
$unit=[
    1=>'Giờ',
    2=>'Ngày',
    3=>'Tuần',
    4=>'Tháng',
]
?>
<!-- Unit Field -->
<div class="form-group col-sm-3">
    {!! Form::label('unit', 'Đơn vị tính:') !!}
    {!! Form::select('unit',$unit, null, ['class' => 'form-control','placeholder'=>true]) !!}
</div>
