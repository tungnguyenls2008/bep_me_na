<!-- Name Field -->
<div class="form-group col-sm-6">
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
<div class="form-group col-sm-6">
    {!! Form::label('provider_id', 'Nhà cung cấp (nếu có):') !!}
    {!! Form::select('provider_id',$provider_select, null, ['class' => 'form-control','id'=>'provider_id','placeholder'=>true]) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
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
<div class="form-group col-sm-6">
    <label for="unit">Đơn vị tính:</label><br>
    {!! Form::select('unit',$unit_select, null, ['class' => 'form-control','placeholder'=>true]) !!}

</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Giá:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>
<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total-display', 'Tổng chi:') !!}
    {!! Form::text('total-display', null, ['class' => 'form-control','readonly'=>true]) !!}
</div>

<!-- Proof Field -->
<div class="form-group col-sm-6">
    {!! Form::label('proof', 'Ảnh hóa đơn(nếu có):') !!}
    {!! Form::file('proof', ['class' => 'form-control','accept'=>'image/x-png,image/jpeg']) !!}
</div>
<script>

    $(function () {
        function addCommas(value) {
            return value
                // Keep only digits and decimal points:
                .replace(/[^\d.]/g, "")
                // Remove duplicated decimal point, if one exists:
                .replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3')
                // Keep only two digits past the decimal point:
                .replace(/\.(\d{2})\d+/, '.$1')
                // Add thousands separators:
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }
        $("#quantity,#price").on('input',function (){
            var quantity=$("#quantity").val();
            var price=$("#price").val();
            var total=quantity*price
            $("#total-display").val(addCommas(total.toString())+'đ')
        })
    })
</script>
