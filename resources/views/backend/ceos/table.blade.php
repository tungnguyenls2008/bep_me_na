<div class="table-responsive">
    <table class="table" id="ceos-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Dob</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Organization Id</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ceos as $ceo)
            <tr>
                <td>{{ $ceo->name }}</td>
            <td>{{ $ceo->dob }}</td>
            <td>{{ $ceo->phone }}</td>
            <td>{{ $ceo->address }}</td>
            <td>{{ $ceo->organization_id }}</td>
            <td>{{ $ceo->status }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['ceos.destroy', $ceo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('ceos.show', [$ceo->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('ceos.edit', [$ceo->id]) }}" class='btn btn-default btn-xs'>
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
