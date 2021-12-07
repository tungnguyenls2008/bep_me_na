<div class="table-responsive">
    <table class="table" id="employees-table">
        <thead>
        <tr>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Vị trí làm việc</th>
            <th>Ca làm việc</th>
            <th>Lương</th>
            <th>Đơn vị tính lương</th>
            <th>Trạng thái</th>
            <th>Đánh giá</th>
            <th colspan="3">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->address }}</td>
                <td>
                    <?php
                    $positions = \App\Models\Position::all();
                    $position_select=[];
                    foreach ($positions as $position) {
                        $position_select[$position->id] = $position->name;
                    }
                    ?>
                    <div class="badge badge-primary">{{$position_select[$employee->position_id]}}</div>
                </td>
                <?php
                $shift = [
                    1 => 'Sáng',
                    2 => 'Trưa',
                    3 => 'Chiều',
                    4 => 'Tối',
                    5 => 'Nửa ngày sáng',
                    6 => 'Nửa ngày tối',
                    7 => 'Cả ngày',
                ]
                ?>
                <td>
                    <div class="badge badge-primary">{{$shift[$employee->shift]}}</div>
                </td>
                <td>{{ number_format($employee->salary) }}đ</td>
                <?php
                $unit = [
                    1 => 'Giờ',
                    2 => 'Ngày',
                    3 => 'Tuần',
                    4 => 'Tháng',
                ]
                ?>
                <td>
                    <div class="badge badge-primary">{{$unit[$employee->unit]}}</div>
                </td>
                <td>
                    @switch($employee->status)
                        @case(0) <a href="{{route('employee-toggle-status',['id'=>$employee->id])}}"
                                    class="badge badge-success"
                                    onclick="return confirm('Bạn chắc chắn muốn đổi trạng thái nhân viên này?')">Đang
                            làm việc</a>@break
                        @case(1) <a href="{{route('employee-toggle-status',['id'=>$employee->id])}}"
                                    class="badge badge-danger"
                                    onclick="return confirm('Bạn chắc chắn muốn đổi trạng thái nhân viên này?')">Nghỉ</a>@break
                    @endswitch
                </td>
                <?php
                $grade = [
                    0 => '<div class="badge badge-secondary">Mới</div>',
                    1 => '<div class="badge badge-primary">Tốt</div>',
                    2 => '<div class="badge badge-success">Tuyệt vời</div>',
                    3 => '<div class="badge badge-danger">Kém</div>',
                ]
                ?>
                <td>
                    {!!  $grade[$employee->grade] !!}
                </td>
                <td width="120">
                    <div class='btn-group'>
                        <a href="{{ route('employees.show', [$employee->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('employees.edit', [$employee->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
