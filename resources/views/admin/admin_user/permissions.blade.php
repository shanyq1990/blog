@extends('admin.admin')
@section('right-side')

    <script>
        /*
        * alterAdminUserPermission
        * */

        function alterAdminUserPermission(admin_user_id,permission_id) {
            admin_user_id=parseInt(admin_user_id);
            permission_id=parseInt(permission_id);

            $.post(
                "{{url('admin/admin_user/alterAdminUserPermission')}}",

                {
                    _token:'{{csrf_token()}}',
                    'admin_user_id':admin_user_id,
                    'permission_id':permission_id

                },

                function (data,status) {
                    alert(data);
                }

            );

        }
        
    </script>

    <h4>{{$admin_user->name}}'s Permissions:</h4>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Permission Name</th>
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
                                <input type="checkbox" {{(array_key_exists($permission->name,$directPermissionsName) or array_key_exists($permission->name,$viaRolePermissionsName))?'checked':''}}  {{array_key_exists($permission->name,$viaRolePermissionsName)?'disabled':''}} onchange="alterAdminUserPermission(<?php echo $admin_user->id.','.$permission->id;?>);" {{$admin_user->hasRole('administrator')?'disabled':''}}>
                                {{array_key_exists($permission->name,$viaRolePermissionsName)? 'via '.$viaRolePermissionsName[$permission->name]:''}}
                            </label>

                        </div>
                    </td>

                </tr>

        @endforeach
        </tbody>
    </table>
@append