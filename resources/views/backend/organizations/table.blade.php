<div class="table-responsive">
    <table class="table" id="organizations-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Ceo Id</th>
        <th>Licence</th>
        <th>Db Name</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($organizations as $organization)
            <tr>
                <td>{{ $organization->name }}</td>
            <td>{{ $organization->ceo_id }}</td>
            <td>{{ $organization->licence }}</td>
            <td>{{ $organization->db_name }}</td>
            <td>{{ $organization->status }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['organizations.destroy', $organization->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('organizations.show', [$organization->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('organizations.edit', [$organization->id]) }}" class='btn btn-default btn-xs'>
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
