<div class="row">
    <h3>CHI TIẾT CHI PHÍ</h3>
</div>
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

            </tr>
        @endforeach
        <tr>
            <td><b>Tổng cộng</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>{{number_format($rawMaterialImports->sum(['total']))}}</b></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>
