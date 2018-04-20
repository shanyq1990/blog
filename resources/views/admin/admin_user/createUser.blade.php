@extends('admin.admin')
@section('right-side')
    <h4>Create AdminUser:</h4>
    <hr>
    <form action="{{url('admin/admin_user/create')}}" class="col-md-8 col-md-offset-2" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" autocomplete="off">
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