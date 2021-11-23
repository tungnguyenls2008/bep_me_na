<div class="table-responsive">
    <table class="table" id="checkoutOrders-table">
        <thead>
            <tr>
                <th>Bill Code</th>
        <th>Menu Id</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Type</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($checkoutOrders as $checkoutOrder)
            <tr>
                <td>{{ $checkoutOrder->bill_code }}</td>
            <td>{{ $checkoutOrder->menu_id }}</td>
            <td>{{ $checkoutOrder->quantity }}</td>
            <td>{{ $checkoutOrder->price }}</td>
            <td>{{ $checkoutOrder->type }}</td>
            <td>{{ $checkoutOrder->user_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['checkoutOrders.destroy', $checkoutOrder->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('checkoutOrders.show', [$checkoutOrder->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('checkoutOrders.edit', [$checkoutOrder->id]) }}" class='btn btn-default btn-xs'>
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
