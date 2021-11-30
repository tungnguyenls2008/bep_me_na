<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Chi phí:') !!}
    <p>{{ $rawMaterialImport->name }}</p>
</div>

<!-- Quantity Field -->
<div class="col-sm-12">
    {!! Form::label('quantity', 'Số lượng:') !!}
    <p>{{ $rawMaterialImport->quantity }}</p>
</div>

<!-- Unit Field -->
<div class="col-sm-12">
    {!! Form::label('unit', 'Đơn vị tính:') !!}
    <p>{{ $rawMaterialImport->unit }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'Giá:') !!}
    <p>{{ number_format($rawMaterialImport->price) }}</p>
</div>

<!-- Total Field -->
<div class="col-sm-12">
    {!! Form::label('total', 'Tổng cộng:') !!}
    <p>{{ number_format($rawMaterialImport->total) }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'Người chi:') !!}
    <?php $user=\App\Models\User::query()->where(['id'=>$rawMaterialImport->user_id])->first(); ?>
    <p>{{ $user->name }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Trạng thái:') !!}<br>
    @switch($rawMaterialImport->status)
        @case(0) <a href="{{route('import-toggle-status',['id'=>$rawMaterialImport->id])}}"
                    class="badge badge-warning"
                    onclick="return confirm('Bạn chắc chắn muốn đổi trạng thái khoản chi này?')">Chưa
            thanh toán</a>@break
        @case(1) <a href="{{route('import-toggle-status',['id'=>$rawMaterialImport->id])}}"
                    class="badge badge-success"
                    onclick="return confirm('Bạn chắc chắn muốn đổi trạng thái khoản chi này?')">Đã thanh
            toán</a>@break
    @endswitch
</div>
