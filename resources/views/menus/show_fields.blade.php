<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Tên:') !!}
    <p>{{ $menu->name }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'Giá:') !!}
    <p>{{ number_format($menu->price )}}</p>
</div>

<!-- Count Field -->
<div class="col-sm-12">
    {!! Form::label('count', 'Đã bán:') !!}
    <p>{{ number_format($menu->count )}}</p>
</div>
<!-- Created at Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Ngày tạo:') !!}
    <p>{{ ($menu->created_at )}}</p>
</div>
<!-- Updated at Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Ngày cập nhật:') !!}
    <p>{{ ($menu->updated_at )}}</p>
</div>
