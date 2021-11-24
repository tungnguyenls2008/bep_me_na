<div class="table-responsive">
    <table class="table" id="rawMaterialImports-table">
        <thead>
        <tr>
            <th>Nội dung</th>
            <th>Số lượng</th>
            <th>Đơn vị</th>
            <th>Giá</th>
            <th>Thành tiền</th>
            <th>Người chi</th>
            <th>Ngày chi</th>
            <th colspan="3">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rawMaterialImports as $rawMaterialImport)
            <tr>
                <td>{{ $rawMaterialImport->name }}</td>
                <td>{{ $rawMaterialImport->quantity }}</td>
                @switch($rawMaterialImport->unit)
                    @case (1)<td><label class="badge badge-info">Kg</label></td> @break
                    @case (2)<td><label class="badge badge-info">Mg</label></td>@break
                    @case (3)<td><label class="badge badge-info">Con</label></td>@break
                    @case (4)<td><label class="badge badge-info">Cái</label></td>@break
                    @case (5)<td><label class="badge badge-info">Mớ</label></td>@break
                    @case (6)<td><label class="badge badge-info">Ngày</label></td>@break
                    @case (7)<td><label class="badge badge-info">Tháng</label></td>@break
                @endswitch
                <td>{{ number_format($rawMaterialImport->price) }}</td>
                <td>{{ number_format($rawMaterialImport->total) }}</td>
                <?php $user=\App\Models\User::query()->where(['id'=>$rawMaterialImport->user_id])->first(); ?>
                <td>{{ $user->name }}</td>
                <td>{{ $rawMaterialImport->created_at }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['rawMaterialImports.destroy', $rawMaterialImport->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('rawMaterialImports.show', [$rawMaterialImport->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('rawMaterialImports.edit', [$rawMaterialImport->id]) }}"
                           class='btn btn-default btn-xs'>
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
