<div class="table-responsive">
    <table class="table" id="menus-table">
        <thead>
        <tr>
            <th>Mặt hàng</th>
            <th>Giá</th>
            <th>Đã bán</th>
            <th>Trạng thái</th>
            <th colspan="3">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php $delay=200; ?>
        @foreach($menus as $menu)

            <tr class="aos-animate" data-aos="fade-in" data-aos-delay="<?= $delay ?>>">
                <td>{{ $menu->name }}</td>
                <td>{{ number_format($menu->price) }}đ</td>
                <td><label class="badge badge-info">{{ $menu->count}}</label></td>
                <td>
                    @switch($menu->status)
                        @case(0) <a href="{{route('menu-toggle-status',['id'=>$menu->id])}}"
                                    class="badge badge-success"
                                    onclick="return confirm('Bạn chắc chắn muốn đổi trạng thái mặt hàng này?')">Đang bán</a>@break
                        @case(1) <a href="{{route('menu-toggle-status',['id'=>$menu->id])}}"
                                    class="badge badge-danger"
                                    onclick="return confirm('Bạn chắc chắn muốn đổi trạng thái mặt hàng này?')">Tạm ngừng</a>@break
                    @endswitch
                </td>
                <td width="120">
{{--                    {!! Form::open(['route' => ['menus.destroy', $menu->id], 'method' => 'delete']) !!}--}}
                    <div class='btn-group'>
                        <a href="{{ route('menus.show', [$menu->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('menus.edit', [$menu->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
{{--                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                    </div>
{{--                    {!! Form::close() !!}--}}
                </td>
            </tr>
            <?php
$delay+=100;
            ?>
        @endforeach
        </tbody>
    </table>
</div>
