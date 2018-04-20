@extends('home.layout')

@section('content')
    <div class="container">
        <form action="{{url('home/auth/register')}}" class="col-md-6 col-md-offset-3" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="first_name">Name:</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmation:</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            @if($errors->count())
                @foreach($errors->all() as $error)
                    <div class="alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <input type="submit" class="form-control" value="Register" style="margin-bottom: 10px">
            <input type="reset" class="form-control" value="Reset">


        </form>
    </div>
@overwrite