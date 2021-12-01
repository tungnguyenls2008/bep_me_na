<div class="table-responsive">
    <table class="table" id="profiles-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Ceo Id</th>
        <th>Product Ids</th>
        <th>Industry Id</th>
        <th>Tax Number</th>
        <th>Address</th>
        <th>Dob</th>
        <th>Phone</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($profiles as $profile)
            <tr>
                <td>{{ $profile->name }}</td>
            <td>{{ $profile->ceo_id }}</td>
            <td>{{ $profile->product_ids }}</td>
            <td>{{ $profile->industry_id }}</td>
            <td>{{ $profile->tax_number }}</td>
            <td>{{ $profile->address }}</td>
            <td>{{ $profile->dob }}</td>
            <td>{{ $profile->phone }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['profiles.destroy', $profile->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('profiles.show', [$profile->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('profiles.edit', [$profile->id]) }}" class='btn btn-default btn-xs'>
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
