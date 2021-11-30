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

