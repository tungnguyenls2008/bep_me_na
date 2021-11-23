<!-- Name Field -->
<div class="form-group col-sm-3">
    {!! Form::label('name', 'Tên nguyên liệu:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
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
    </select>
</div>

<!-- Price Field -->
<div class="form-group col-sm-3">
    {!! Form::label('price', 'Giá:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

