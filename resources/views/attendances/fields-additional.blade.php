<!-- Employee Id Field -->
<div class="form-group col-sm-3">
    <?php
    $employees = \App\Models\Employee::where(['status' => 0])->get();
    $employee_select = [];
    foreach ($employees as $employee) {
        $employee_select[$employee->id] = $employee->name;
    }
    ?>
    {!! Form::label('employee_id', 'Nhân viên:') !!}

    {!! Form::select('employee_id',$employee_select,null, ['class' => 'form-control','placeholder'=>true]) !!}


</div>

<!-- Status Field -->
<div class="form-group col-sm-3">
    {!! Form::label('status', 'Chấm công:') !!}

    {!! Form::select('status',
        [0=>'Đủ công',1=>'Nửa công',2=>'Nghỉ phép',3=>'Nghỉ không lương'], null,
        ['class' => 'form-control','placeholder'=>true,'id'=>'status']) !!}

</div>

<!-- Reason Field -->
<div class="form-group col-sm-3 reason-div">
    {!! Form::label('reason', 'Lý do (nếu có):') !!}

        {!! Form::text('reason', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500,'placeholder'=>'Nhập lý do']) !!}

</div>

<!-- Date Field -->
<div class="form-group col-sm-3">
    {!! Form::label('date', 'Ngày:') !!}

        {!! Form::text('date', null, ['class' => 'form-control date','id'=>'date','autocomplete'=>'off']) !!}

</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'DD-MM-YYYY',
            useCurrent: true,
            sideBySide: true,
            maxDate: new Date()
        })
        $(".reason-div").hide()
        $(function () {

            $("#status").on('change', function () {
                if ($(this).val() != 0) {
                    $(".reason-div").fadeIn().show()
                } else {
                    $(".reason-div").fadeOut().hide()
                }
            })


        })
    </script>
@endpush
