<div class="table-responsive">
    <table class="table" id="notes-table">
        <thead>
            <tr>
                <th>Bill Code</th>
        <th>Content</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($notes as $note)
            <tr>
                <td>{{ $note->bill_code }}</td>
            <td>{{ $note->content }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['notes.destroy', $note->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('notes.show', [$note->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('notes.edit', [$note->id]) }}" class='btn btn-default btn-xs'>
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
