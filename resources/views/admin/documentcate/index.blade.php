@extends('admin.admin')
@section('right-side')
    <h4>Documentcate List:</h4>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name:</th>
            <th>enName:</th>
            <th>Action</th>
        </tr>

        @foreach($documentcates as $documentcate)
            <tr>
                <td>{{$documentcate->id}}</td>
                <td>{{$documentcate->name}}</td>
                <td>{{$documentcate->enname}}</td>
                <td>
                    @if(Auth::guard('admin')->user()->hasPermissionTo('documentcate edit'))
                        <a href="{{url('admin/documentcate/edit/'.$documentcate->id)}}">Edit</a>
                    @endif
                    @if(Auth::guard('admin')->user()->hasPermissionTo('documentcate delete'))
                        <a href="{{url('admin/documentcate/delete/'.$documentcate->id)}}" onclick="return confirm('确定删除？');">Delete</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </thead>
    </table>
@append