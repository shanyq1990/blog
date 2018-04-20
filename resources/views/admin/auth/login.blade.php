@extends('admin.layout')

@section('content')
    <div class="container">
        <form action="{{url('admin/auth/login')}}" class="col-md-6 col-md-offset-3" method="post">
            {{csrf_field()}}


            <div class="form-group">
                <label for="name">Name:</label>
                <input type="name" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="checkbox">
                <label><input type="checkbox" value="remember_me" name="remember_me">Remember me</label>
            </div>


            @if($errors->count())
                @foreach($errors->all() as $error)
                    <div class="alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <input type="submit" class="form-control" value="Login" style="margin-bottom: 10px">
            <input type="reset" class="form-control" value="Reset">
        </form>
    </div>
@append