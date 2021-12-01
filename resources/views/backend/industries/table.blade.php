<div class="table-responsive">
    <table class="table" id="industries-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($industries as $industry)
            <tr>
                <td>{{ $industry->name }}</td>
            <td>{{ $industry->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['industries.destroy', $industry->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('industries.show', [$industry->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('industries.edit', [$industry->id]) }}" class='btn btn-default btn-xs'>
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
