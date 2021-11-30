<div class="table-responsive">
    <table class="table" id="positions-table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($positions as $position)
            <tr>
                <td>{{ $position->name }}</td>
                <td>
                    @switch($position->status)
                        @case(0) <a href="{{route('position-toggle-status',['id'=>$position->id])}}"
                                    class="badge badge-success"
                                    onclick="return confirm('Bạn chắc chắn muốn đổi trạng thái vị trí công việc này?')">Đang sử dụng</a>@break
                        @case(1) <a href="{{route('position-toggle-status',['id'=>$position->id])}}"
                                    class="badge badge-danger"
                                    onclick="return confirm('Bạn chắc chắn muốn đổi trạng thái vị trí công việc này?')">Không dùng</a>@break
                    @endswitch
                </td>
                <td width="120">
                    <div class='btn-group'>
                        <a href="{{ route('positions.show', [$position->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('positions.edit', [$position->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
