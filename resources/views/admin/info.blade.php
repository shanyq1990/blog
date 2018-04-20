@extends('admin.layout')
@section('content')

    <div class="container">
        <h3>
            {{$message or 'nothing'}}
        </h3>
    </div>
@append