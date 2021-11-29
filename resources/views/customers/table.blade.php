<div class="table-responsive">
    <table class="table" id="customers-table">
        <thead>
        <tr>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Điạ chỉ</th>
            <th>Ngày sinh</th>
            <th>Sở thích</th>
            <th>Số lần Order</th>
            <th>Ghi chú</th>
            <th colspan="3">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ date('d-m-Y',strtotime($customer->dob)) }}</td>
                <?php
                $favorites = json_decode($customer->favorites, true);
                $menu = \App\Models\Menu::find($favorites);
                ?>
                <td>
                    @foreach($menu as $item)
                        <div class="badge badge-pill badge-danger">{{$item->name}}</div>
                    @endforeach
                </td>
                <td>{{ $customer->order_count }}</td>
                <td>{{ $customer->note }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['customers.destroy', $customer->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('customers.show', [$customer->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('customers.edit', [$customer->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
