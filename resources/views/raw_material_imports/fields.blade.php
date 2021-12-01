<!-- Name Field -->
<div class="form-group col-sm-3">
    {!! Form::label('name', 'Nội dung chi phí:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
<!-- Provider Field -->
<?php
$providers=\App\Models\Provider::where(['status'=>0])->get();
$provider_select=[];
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
<?php
$units=\App\Models\Unit::all();
$unit_select=[];
foreach ($units as $unit){
    $unit_select[$unit->id]=$unit->name;
}
?>
<!-- Unit Field -->
<div class="form-group col-sm-3">
    <label for="unit">Đơn vị tính:</label><br>
    {!! Form::select('unit',$unit_select, null, ['class' => 'form-control','placeholder'=>true]) !!}

</div>

<!-- Price Field -->
<div class="form-group col-sm-3">
    {!! Form::label('price', 'Giá:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

