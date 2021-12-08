<div class="table-responsive">
    <?php

    ?>
    <table class="table" id="attendances-table">
        <thead>
        <tr>
            <th>Nhân viên</th>
            <th>Chấm công</th>
            <th>Lý do</th>
            <th>Ngày chấm</th>
            <th colspan="3">Thao tác</th>
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
                <td>{{ $attendance->reason }}</td>
                <td>{{ date('d-m-Y',strtotime($attendance->date)) }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['attendances.destroy', $attendance->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
{{--                        <a href="{{ route('attendances.show', [$attendance->id]) }}" class='btn btn-default btn-xs'>--}}
{{--                            <i class="far fa-eye"></i>--}}
{{--                        </a>--}}
                        <a href="{{ route('attendances.edit', [$attendance->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
{{$attendances->links()}}
