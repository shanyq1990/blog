@extends('home.layout')
{{--@section('content')--}}

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

{{--<div class="container">

    <div class="row">


        <h3 class="col-md-4" style="padding-right: 0">文章列表:</h3>
        <div class="clearfix"></div>
        <hr>

        <div class="col-md-9">

            <ul class="list-group document-list">
                @foreach($documents as $document)
                    <li class="list-group-item">
                        <a href="{{url('home/document/detail/'.$document->id)}}">{{$document->title}}</a>

                        <span>更新于: {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$document->updated_at)->diffForHumans()}}</span>

                        <span class="badge">{{$document->documentcate->name}}</span>

                    </li>
                @endforeach
            </ul>

            {{$documents->appends(['like'=>$like,'documentcate_id'=>$documentcate_id])->links()}}

        </div>
        <div class="col-md-3">

            <form action="{{url('/home?documentcate_id='.$documentcate_id)}}"  class="col-md-12" style="padding: 0" method="get">

                <div class="form-group pull-right" style="padding-right: 0">

                    <div class="input-group">
                        <input type="text" class="form-control" name="like" value="{{$like}}">
                        <span class="input-group-btn">
                        <input type="submit" class="btn btn-default" value="Search">
                    </span>
                    </div>

                </div>
            </form>
            <div class="clearfix"></div>
            <div class="panel panel-default text-center corner-radius">
                <div class="panel-heading">统计信息</div>
                <ul class="list-group sidebar-list">
                    <li class="list-group-item">
                        <a href="{{url('home?like='.$like)}}" class='{{$documentcate_id?'':'documentcate-selected'}}'>
                            <span>全部</span>
                            <span>共{{$documents_sum->count()}}篇</span>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    @foreach($documentcates as $documentcate)
                        <li class="list-group-item">
                            <a href="{{url('home?like='.$like.'&&documentcate_id='.$documentcate->id)}}" class='{{$documentcate->id==$documentcate_id?'documentcate-selected':''}}'>
                                <span>{{$documentcate->name}}</span>
                                <span>共{{$documentcate->documents->intersect($documents_sum)->count()}}篇</span>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                    @endforeach

                    <div class="clearfix"></div>
                </ul>
            </div>



            <div class="panel panel-default text-center corner-radius">
                <div class="panel-heading">常用链接</div>
                <ul class="list list-group sidebar-list ">
                    <li class="list-group-item ">
                        <a href="https://packagist.org/" target="_blank" title="Packagist">
                            <img src="{{asset('image/banner/packagist.png')}}">
                            Packagist
                        </a>
                    </li>
                    <li class="list-group-item ">
                        <a href="https://github.com/" target="_blank" title="GitHub">
                            <img src="{{asset('image/banner/github.jpg')}}">
                            GitHub
                        </a>
                    </li>
                    <li class="list-group-item ">
                        <a href="http://d.laravel-china.org/" target="_blank" title="Laravel 中文文档">
                            <img src="{{asset('image/banner/laravel_document.jpg')}}">
                            Laravel 中文文档
                        </a>
                    </li>
                    <li class="list-group-item ">
                        <a href="https://cs.laravel-china.org/" target="_blank" title="Laravel 速查表">
                            <img src="{{asset('image/banner/laravel_fast_search.jpg')}}">
                            Laravel 速查表
                        </a>
                    </li>

                    <li class="list-group-item ">
                        <a href="https://laravel-china.github.io/php-the-right-way/" target="_blank" title="《PHP 之道》">
                            <img src="{{asset('image/banner/php_dao.png')}}">
                            《PHP 之道》
                        </a>
                    </li>
                    <li class="list-group-item ">
                        <a href="https://laravel-china.org/composer" target="_blank" title="Composer 中文镜像">
                            <img src="{{asset('image/banner/composer_chinese.png')}}">
                            Composer 中文镜像
                        </a>
                    </li>

                    <li class="list-group-item ">
                        <a href="https://laravel-china.org/docs/laravel-specification" target="_blank" title="Laravel 开发规范">
                            <img src="{{asset('image/banner/laravel_universe.png')}}">
                            Laravel 开发规范
                        </a>
                    </li>

                </ul>
            </div>





        </div>
    </div>

</div>--}}



{{--@append--}}

@section('left-side')


    <ul class="list-group document-list">
        @foreach($documents as $document)
            <li class="list-group-item">
                <a href="{{url('home/document/detail/'.$document->id)}}">{{$document->title}}</a>

                <span>更新于: {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$document->updated_at)->diffForHumans()}}</span>

                <span class="badge">{{$document->documentcate->name}}</span>

            </li>
        @endforeach
    </ul>

    {{$documents->appends(['like'=>$like,'documentcate_id'=>$documentcate_id])->links()}}


@append

@section('right-side')
    @include('home/search_form')
    @include('home/statics_panel')
    @include('home/links')
    @append
