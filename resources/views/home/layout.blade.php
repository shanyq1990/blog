@extends('base')

@section('content')

    <style>
        .document-list {
            line-height: 30px;
            font-size: 18px;

            box-shadow: -5px -5px 5px rgba(137, 137, 137, 0.52) inset;
        }

        .document-list > li:first-child, .list-group > li:last-child {
            border-radius: 0;
        }

        .document-list .list-group-item {
            padding-left: 20px;
        }

        .document-list .list-group-item > a {
            display: block;
            font-size: 20px;
            width: 80%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .document-list .list-group-item > a:hover {
            text-decoration: none;
        }

        .document-list .list-group-item > span {
            font-size: 15px;
        }

        .document-list .list-group-item .badge {
            margin-top: -10px;
            margin-right: 10px;
        }


    </style>

    <style>

        .sidebar-list .list-group-item {
            padding: 0;
            line-height: 30px;
            text-align: left;
        }

        .sidebar-list a {
            display: block;

        }

        .documentcate-selected,.sidebar-list a:hover {
            text-decoration: none;
            background-color: rgba(230, 230, 230, 0.6);
        }

        .sidebar-list a > span:first-child {
            margin-left: 30px;
            float: left;
        }

        .sidebar-list a > span:nth-child(2) {
            margin-right: 30px;
            float: right;
        }

        .sidebar-list img{
            float: left;
            margin: 5px 10px 5px 30px;
            width: 20px;
            height:20px;
        }
    </style>

    <div class="container">
        <div class="row">
            <h3  style="padding-left: 30px;">技术笔记</h3>
                {{--<img src="{{asset('/image/title.jpg')}}" alt="">--}}
            <div class="clearfix"></div>
            <hr>
        </div>

        <div class="row">

            <div class="col-md-9">
                @yield('left-side')
            </div>

            <div class="col-md-3">
                @yield('right-side')

            </div>
        </div>
    </div>


@append