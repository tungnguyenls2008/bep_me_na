<!-- Name Field -->
<div class="form-group col-sm-3">
    {!! Form::label('name', 'Nội dung chi phí:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
<!-- Provider Field -->
<?php
$providers=\App\Models\Provider::all();
foreach ($providers as $provider){
    $provider_select[$provider->id]=$provider->name;
}
?>
<div class="form-group col-sm-3">
    {!! Form::label('provider_id', 'Nhà cung cấp (nếu có):') !!}
    {!! Form::select('provider_id',$provider_select, null, ['class' => 'form-control','id'=>'provider_id','placeholder'=>true]) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-3">
    {!! Form::label('quantity', 'Số lượng:') !!}
    {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Unit Field -->
<div class="form-group col-sm-3">
    <label for="unit">Đơn vị tính:</label><br>
    <select name="unit" id="unit" class="form-control">
        <option value="1">Kg</option>
        <option value="2">Mg</option>
        <option value="3">Con</option>
        <option value="4">Cái</option>
        <option value="5">Mớ</option>
        <option value="6">Ngày</option>
        <option value="7">Tháng</option>
    </select>
</div>

<!-- Price Field -->
<div class="form-group col-sm-3">
    {!! Form::label('price', 'Giá:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

