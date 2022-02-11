<div class="row">
    <h1>CHI TIẾT CHẤM CÔNG NHÂN VIÊN</h1>
</div>
<div class="table-responsive">
<?php
    $total_salary=$attendances->last();
    $attendances=$attendances->slice(0,-1);
    ?>
    <table class="table" id="attendances-table">
        <thead>
        <tr>
            <th><b>Nhân viên</b></th>
            <th><b>Chấm công</b></th>
            <th><b>Lương thực nhận</b></th>
            <th><b>Lý do</b></th>
            <th><b>Ngày chấm</b></th>
        </tr>
        </thead>
        <tbody>
        @foreach($attendances as $attendance)
            <tr>
                <td>
                    <?php
                    $employee = \App\Models\Employee::where(['id' => $attendance->employee_id])->first();
                    ?>
                    {{ $employee?$employee->name:'' }}
                </td>
                <td><?php
                    switch($attendance->status){
                        case 0: echo '<span class="badge badge-success">Đủ công</span>';
                            break;
                        case 1: echo '<span class="badge badge-primary">Nửa công</span>';
                            break;
                        case 2: echo '<span class="badge badge-warning">Nghỉ phép</span>';
                            break;
                        case 3: echo '<span class="badge badge-danger">Nghỉ không lương</span>';
                            break;
                    }
                    ?></td>
                <td>
                    <?php
                    switch($attendance->status){
                        case 2:
                        case 0: echo $employee->salary;
                            break;
                        case 1: echo $employee->salary/2;
                            break;
                        case 3: echo 0;
                            break;
                    }
                    ?>
                </td>
                <td>{{ $attendance->reason??'Hoàn thành' }}</td>
                <td>{{ date('d-m-Y',strtotime($attendance->date)) }}</td>

            </tr>
        @endforeach
        <tr>
            <td></td>
            <td><b>Tổng cộng:</b></td>
            <td>
                {{$total_salary}}
            </td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>
