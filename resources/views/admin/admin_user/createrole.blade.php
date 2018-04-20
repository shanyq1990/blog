@extends('admin.admin')
@section('right-side')
    <h4>Create Role:</h4>
    <hr>
    <form action="{{url('admin/admin_user/createrole')}}" class="col-md-8 col-md-offset-2" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control">
        </div>


        @if($errors->count())
            @foreach($errors->all() as $error)
                <div class="alert-danger">{{$error}}</div>
            @endforeach

        @endif

        <input type="submit" value="Create" class="form-control" style="margin-bottom: 10px">
        <input type="reset" value="Reset" class="form-control">


    </form>
@append