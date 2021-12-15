<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
        <tr>
            <th>Tên</th>
            <th>Email</th>
            <th>Quyền</th>
            <th colspan="3">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{!! $user->name !!}
                    <?php if ($user->is_ceo == 1) echo '<div class="badge badge-success">CEO</div>';?></td>
                <td>{!! $user->email !!}</td>
                <td>
                    <?php
                    $permissions = json_decode($user->permissions, true);
                    ?>
                    <?php
                    if ($user->is_ceo == 1) {
                        echo '<div class="badge badge-primary">Quyền lực tối cao</div>';
                    } else if ($permissions != null) {
                        $roles = \App\Models\Models_be\Role::withoutTrashed()->whereIn('id', $permissions)->get();
                        foreach ($roles as $role) {
                            echo '<div class="badge badge-success">' . $role->description . '</div>';
                        }
                    } ?>
                </td>
                <td>
                    {{--                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}--}}
                    <div class='btn-group'>
                        <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i
                                class="far fa-eye"></i></a>
                        <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i
                                class="far fa-edit"></i></a>
                        {{--                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                    </div>
                    {{--                    {!! Form::close() !!}--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
