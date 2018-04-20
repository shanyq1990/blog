@extends('admin.admin')
@section('right-side')

    <h4>Role List</h4>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{$role->id}}</td>

                <td>{{$role->name}}</td>


                <td>
                    @if(Auth::guard('admin')->user()->hasPermissionTo('admin_role permission'))
                        <a href="{{url('admin/admin_user/rolepermissions/'.$role->id)}}">Permissions</a>
                    @endif
                    @if(Auth::guard('admin')->user()->hasPermissionTo('admin_role user'))
                        <a href="{{url('admin/admin_user/roleusers/'.$role->id)}}">Users</a>
                    @endif
                    @if(Auth::guard('admin')->user()->hasPermissionTo('admin_role delete'))
                        <a href="{{url('admin/admin_user/deleterole/'.$role->id)}}" onclick="return confirm('delete?');" {{$role->name==='administrator'?'hidden':''}}>Delete</a>
                    @endif
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
@append