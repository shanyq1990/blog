@extends('admin.admin')
@section('right-side')
    <script>
        function alterAdminUserRole(name) {

            $.post(
                '{{url('admin/admin_user/alterAdminUserRole')}}',
                {   '_token': '{{csrf_token()}} ',
                    'role_name': name,
                    'admin_user_id': '{{$admin_user->id}}'
                },
                function (data,status) {
                    alert(data);
                }

                );
        }
    </script>
    <h4>User {{$admin_user->name}} 's Role:</h4>
    <hr>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Role</th>
            <th>inRole</th>
        </tr>
        </thead>

        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>
                    <div class="checkbox">
                        <label for="">
                            <input type="checkbox" onclick="alterAdminUserRole('{{$role->name}}')" {{$admin_user->hasRole($role)?'checked':' '}} {{$role->name=='administrator'?'disabled':''}}>
                        </label>
                    </div>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @append