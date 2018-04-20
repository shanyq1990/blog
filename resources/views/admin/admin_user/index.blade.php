@extends('admin.admin')
@section('right-side')

    <h4>Admin_User List:</h4>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach($admin_users as $admin_user)
            <tr>
                <td>{{$admin_user->id}}</td>

                <td>{{$admin_user->name}}</td>

                <td>{{$admin_user->email}}</td>

                <td>
                    @if(Auth::guard('admin')->user()->hasPermissionTo('admin_user permission'))
                        <a href="{{url('admin/admin_user/userpermissions/'.$admin_user->id)}}">Permissions</a>
                    @endif
                    @if(Auth::guard('admin')->user()->hasPermissionTo('admin_user role'))
                        <a href="{{url('admin/admin_user/userrole/'.$admin_user->id)}}">Roles</a>
                    @endif
                    @if(Auth::guard('admin')->user()->hasPermissionTo('admin_user delete'))
                        <a href="{{url('admin/admin_user/delete/'.$admin_user->id)}}" onclick="return confirm('delete?')" {{$admin_user->hasRole('administrator')?'hidden':''}}>Delete</a>
                    @endif
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
@append