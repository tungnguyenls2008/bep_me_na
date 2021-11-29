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

