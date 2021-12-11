<div class="table-responsive">
    <table class="table" id="organizations-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Ceo Id</th>
        <th>Licence</th>
        <th>Db Name</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($organizations as $organization)
            <tr
            @if($organization->lock_status==0)
                style=""
            @else
                style="color: red"
            @endif
            >
                <td>{{ $organization->name }}</td>
            <td>{{ $organization->ceo_id }}</td>
            <td>{{ $organization->licence }}</td>
            <td>{{ $organization->db_name }}</td>
            <td>
                @switch($organization->lock_status)
                    @case(1) <a href="{{route('organization-toggle-lock',['id'=>$organization->id])}}"
                                class="btn btn-danger btn-xs"
                                onclick="return confirm('Bạn chắc chắn muốn MỞ KHÓA cửa hàng này?')" ><i class="fas fa-lock"></i></i></a>@break
                    @case(0) <a href="{{route('organization-toggle-lock',['id'=>$organization->id])}}"
                                class="btn btn-success btn-xs"
                                onclick="return confirm('Bạn chắc chắn muốn KHÓA cửa hàng này?')"><i class="fas fa-lock-open"></i></a>@break
                @endswitch
                @switch($organization->status)
                    @case(0) <a href="{{route('organization-toggle-status',['id'=>$organization->id])}}"
                                class="badge badge-warning"
                                onclick="return confirm('Bạn chắc chắn muốn đổi trạng thái cửa hàng này thành CHÍNH THỨC?')">Dùng thử</a>@break
                    @case(1) <a href="{{route('organization-toggle-status',['id'=>$organization->id])}}"
                                class="badge badge-success"
                                onclick="return confirm('Bạn chắc chắn muốn đổi trạng thái cửa hàng này thành DÙNG THỬ?')">Chính thức</a>@break
                @endswitch

            </td>
                <td width="120">
{{--                    {!! Form::open(['route' => ['organizations.destroy', $organization->id], 'method' => 'delete']) !!}--}}
                    <div class='btn-group'>
                        <a href="{{ route('organizations.show', [$organization->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>

{{--                        <a href="{{ route('organizations.edit', [$organization->id]) }}" class='btn btn-default btn-xs'>--}}
{{--                            <i class="far fa-edit"></i>--}}
{{--                        </a>--}}
{{--                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                    </div>
{{--                    {!! Form::close() !!}--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
