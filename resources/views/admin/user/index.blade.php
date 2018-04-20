@extends('admin.admin')
@section('right-side')
    <h4>Home User List:</h4>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name:</th>
            <th>Email:</th>
            <th>Action</th>
        </tr>

        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if(Auth::guard('admin')->user()->hasPermissionTo('user delete'))
                        <a href="{{url('admin/user/delete/'.$user->id)}}" onclick="return confirm('delete?');">Delete</a>
                    @endif

                </td>
            </tr>
        @endforeach
        </thead>
    </table>
@append