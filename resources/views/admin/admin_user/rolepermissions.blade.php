@extends('admin.admin')
@section('right-side')

    <script>
        function alterAdminRolePermission(permission) {
            
            $.post(
                '{{url('admin/admin_user/alterAdminRolePermission')}}',
                {'_token':'{{csrf_token()}}','permission_id':permission,'role_id':'{{$role->id}}'},
                function (data,status) {
                    alert(data);
                }
            );
        }
    </script>

    <h4>Role <strong>{{$role->name}}</strong> 's Permissions:</h4>


    <hr>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Permission</th>
            <th>Access</th>
        </tr>
        </thead>

        <tbody>


        @foreach($permissions as $permission)

            <tr>
                <td>{{$permission->id}}</td>

                <td>{{$permission->name}}</td>

                <td>
                    <div class="checkbox">
                        <label for="hasPermssion">
                            <input type="checkbox" {{$role->hasPermissionTo($permission)?'checked':''}} onchange="alterAdminRolePermission(<?php echo $permission->id;?>);" {{$role->name==='administrator'?'disabled':''}}>
                        </label>

                    </div>
                </td>

            </tr>

        @endforeach


        </tbody>
    </table>
    @append