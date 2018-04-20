@extends('admin.admin')
@section('right-side')
    <h4>Create Documentcate:</h4>
    <hr>
    <form action="{{url('admin/documentcate/create')}}" method="post" class="col-md-6 col-md-offset-3">
        {{csrf_field()}}

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="enname">EnName:</label>
            <input type="text" name="enname" class="form-control">
        </div>

        @if($errors->count())
            @foreach($errors->all() as $error)
                <div class="alert-danger">{{$error}}</div>
                @endforeach
            @endif
        <input type="submit" class="form-control" value="Submit" style="margin-bottom: 10px">
        <input type="reset" class="form-control" value="Reset">
    </form>
    @append