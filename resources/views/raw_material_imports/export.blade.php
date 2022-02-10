<div class="row">
    <h1>CHI TIẾT CHI PHÍ</h1>
</div>
<div class="table-responsive">
    <table class="table" id="expending-table">
        <thead>
        <tr>
            <th>Nội dung</th>
            <th>Nhà cung cấp</th>
            <th>Số lượng</th>
            <th>Đơn vị</th>
            <th>Giá</th>
            <th>Thành tiền</th>
            <th>Người chi</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $units=\App\Models\Unit::select(['id','name'])->get();
        $unit_select=[];
        foreach ($units as $unit){
            $unit_select[$unit->id]=$unit->name;
        }
        ?>
        @foreach($expending as $rawMaterialImport)
            <tr>
                <td>{{ $rawMaterialImport->name }}</td>
                <td>
                    @if($rawMaterialImport->provider_id!=null)
                        <?php
                        $provider=\App\Models\Provider::find($rawMaterialImport->provider_id);
                        if ($provider!=null){
                            echo $provider->name.'-'.$provider->phone;
                        }
                        ?>
                        @endif
                </td>
                <td>{{ $rawMaterialImport->quantity }}</td>
                <td><label class="badge badge-info">{{$unit_select[$rawMaterialImport->unit]}}</label></td>
                <td>{{ ($rawMaterialImport->price) }}</td>
                <td>{{ ($rawMaterialImport->total) }}</td>
                <?php $user=\App\Models\User::query()->where(['id'=>$rawMaterialImport->user_id])->first(); ?>
                <td>{{ $user->name }}</td>
                <td>
                    @switch($rawMaterialImport->status)
                        @case(0) Chưa thanh toán @break
                        @case(1) Đã thanh toán @break
                    @endswitch
                </td>
                <td>{{ $rawMaterialImport->created_at }}</td>

            </tr>
        @endforeach
        <tr>
            <td><b>Tổng cộng</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>{{($expending->sum(['total']))}}</b></td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>
