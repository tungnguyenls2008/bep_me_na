<!-- Employee Id Field -->
<div class="form-group col-sm-3">
    <?php
    $employees = \App\Models\Employee::where(['status' => 0])->get();

?>
    {!! Form::label('employee_id', 'Nhân viên:') !!}
    @foreach($employees as $employee)
        {!! Form::text('employee_id[]',$employee->id, ['class' => 'form-control','hidden'=>true]) !!}
        {!! Form::text('employee_name[]',$employee->name, ['class' => 'form-control','readonly'=>true]) !!}
    @endforeach
</div>

<!-- Status Field -->
<div class="form-group col-sm-3">
    {!! Form::label('status', 'Chấm công:') !!}
    @foreach($employees as $employee)
        {!! Form::select('status[]',
            [0=>'Đủ công',1=>'Nửa công',2=>'Nghỉ phép',3=>'Nghỉ không lương'], 0,
            ['class' => 'form-control','placeholder'=>true,'id'=>'status-'.$employee->id]) !!}
    @endforeach
</div>

<!-- Reason Field -->
<div class="form-group col-sm-3 reason-div">
    {!! Form::label('reason', 'Lý do (nếu có):') !!}
    @foreach($employees as $employee)
        {!! Form::text('reason[]', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500,'placeholder'=>'Nhập lý do']) !!}
    @endforeach
</div>

<!-- Date Field -->
<div class="form-group col-sm-3">
    {!! Form::label('date', 'Ngày:') !!}
    @foreach($employees as $employee)
        {!! Form::text('date[]', date('d-m-Y H:m',time()), ['class' => 'form-control date','id'=>'date','autocomplete'=>'off']) !!}
    @endforeach
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('.date').datetimepicker({
            format: 'DD-MM-YYYY',
            useCurrent: true,
            sideBySide: true,
            maxDate: new Date()
        })
        $(".reason-div").hide()
        $(function () {
            @foreach($employees as $employee)
            $("#status-<?= $employee->id ?>").on('change', function () {
                if ($(this).val() != 0) {
                    $(".reason-div").fadeIn().show()
                } else {
                    $(".reason-div").fadeOut().hide()
                }
            })
            @endforeach

        })
    </script>
@endpush
