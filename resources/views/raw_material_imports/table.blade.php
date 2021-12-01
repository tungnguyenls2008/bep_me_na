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
            <th>Thời gian</th>
            <th colspan="3">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $units = \App\Models\Unit::all();
        $unit_select = [];
        $unit_badge = [];
        ?>
        @foreach($rawMaterialImports as $rawMaterialImport)

            <tr>
                <td>{{ $rawMaterialImport->name }}<br>
                    @if($rawMaterialImport->provider_id!=null)
                        <?php
                        $provider = \App\Models\Provider::find($rawMaterialImport->provider_id);
                        ?>
                        @if($provider!=null)
                            <b>Nhà cung cấp:</b> <a
                                href="{{route('providers.show',['provider'=>$rawMaterialImport->provider_id])}}">{{$provider->name}}</a>@if($provider->status==1)
                                <div class="badge badge-secondary" data-toggle="tooltip" data-placement="top"
                                     title="Tạm ngừng"><i class="fas fa-pause-circle"></i></div>
                            @endif
                        @endif
                    @endif
                </td>
                <td>{{ $rawMaterialImport->quantity }}</td>
                <?php
                foreach ($units as $unit) {
                    $unit_badge[$unit->id] = '<td><label class="badge badge-info">' . $unit->name . '</label></td>';
                    if ($rawMaterialImport->unit == $unit->id) {
                        echo $unit_badge[$unit->id];
                    }
                }
                ?>
                <td>{{ number_format($rawMaterialImport->price) }}đ</td>
                <td>{{ number_format($rawMaterialImport->total) }}đ</td>
                <?php $user = \App\Models\User::query()->where(['id' => $rawMaterialImport->user_id])->first(); ?>
                <td>{{ $user->name }}</td>
                <td>
                    <b>Ngày tạo:</b> {{ $rawMaterialImport->created_at }}<br>
                    @if(isset($rawMaterialImport->updated_at) && $rawMaterialImport->updated_at!=$rawMaterialImport->created_at)
                        <b>Ngày cập nhật:</b> {{ $rawMaterialImport->updated_at }}<br>
                    @endif
                    <b>Trạng thái: </b>
                    @switch($rawMaterialImport->status)
                        @case(0) <a href="{{route('import-toggle-status',['id'=>$rawMaterialImport->id])}}"
                                    class="badge badge-warning"
                                    onclick="return confirm('Bạn chắc chắn muốn đổi trạng thái khoản chi này?')">Chưa
                            thanh toán</a>@break
                        @case(1) <a href="{{route('import-toggle-status',['id'=>$rawMaterialImport->id])}}"
                                    class="badge badge-success"
                                    onclick="return confirm('Bạn chắc chắn muốn đổi trạng thái khoản chi này?')">Đã
                            thanh
                            toán</a>@break
                    @endswitch

                </td>
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
