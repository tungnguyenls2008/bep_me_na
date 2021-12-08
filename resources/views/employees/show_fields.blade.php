<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Tên:') !!}
    <p>{{ $employee->name }}</p>
</div>

<!-- Phone Field -->
<div class="col-sm-12">
    {!! Form::label('phone', 'Số điện thoại:') !!}
    <p>{{ $employee->phone }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Địa chỉ:') !!}
    <p>{{ $employee->address }}</p>
</div>

<!-- Position Id Field -->
<div class="col-sm-12">
    {!! Form::label('position_id', 'Vị trí làm việc:') !!}
    <p>{{ $employee->position_id }}</p>
</div>

<!-- Shift Field -->
<div class="col-sm-12">
    {!! Form::label('shift', 'Ca làm việc:') !!}
    <p>{{ $employee->shift }}</p>
</div>

<!-- Salary Field -->
<div class="col-sm-12">
    {!! Form::label('salary', 'Lương:') !!}
    <p>{{ $employee->salary }}</p>
</div>

<!-- Unit Field -->
<div class="col-sm-12">
    {!! Form::label('unit', 'Đơn vị tính:') !!}
    <p>{{ $employee->unit }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Trạng thái:') !!}
    <p>{{ $employee->status }}</p>
</div>

<!-- Grade Field -->
<div class="col-sm-12">
    {!! Form::label('grade', 'Đánh giá:') !!}
    <p>{{ $employee->grade }}</p>
</div>

