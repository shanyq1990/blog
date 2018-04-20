@extends('base')

@section('content')

    <style>
        body{
            /*background: rgba(255,255,255,0.5);*/
            background-image: url("image/liu/liu_1.jpg");

        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <a href="{{url('home')}}">技术笔记</a>
            </div>
        </div>
    </div>

@append