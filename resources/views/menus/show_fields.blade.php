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
<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Trạng thái:') !!}
    @switch($menu->status)
        @case(0) <a href="{{route('menu-toggle-status',['id'=>$menu->id])}}"
                    class="badge badge-success"
                    onclick="return confirm('Bạn chắc chắn muốn đổi trạng thái mặt hàng này?')">Đang bán</a>@break
        @case(1) <a href="{{route('menu-toggle-status',['id'=>$menu->id])}}"
                    class="badge badge-danger"
                    onclick="return confirm('Bạn chắc chắn muốn đổi trạng thái mặt hàng này?')">Tạm ngừng</a>@break
    @endswitch
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
