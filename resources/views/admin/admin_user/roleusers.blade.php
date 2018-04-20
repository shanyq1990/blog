@extends('admin.admin')
@section('right-side')

    <h4>{{$role->name}} 's user List:</h4>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        </thead>

        <tbody>
        @foreach($users as $user)

                <tr>
                    <td>{{$user->id}}</td>

                    <td>{{$user->name}}</td>

                </tr>
        @endforeach
        </tbody>
    </table>
@append