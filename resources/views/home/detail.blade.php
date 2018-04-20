@extends('home.layout')
@section('left-side')

    <script>
        $(document).ready(function () {

            $('#Maney').popover({
                trigger:'hover',
                html:true,
                placement:'top',
                content:'<img src="{{asset('image/wxsk.png')}}" style="width:200px;height:200px">'
            });


            $('article').html(marked($('textarea').val()));

            hljs.initHighlightingOnLoad();

        });

    </script>



    <div id="article" >
        <h3>{{$document->title}}</h3>
        <h5>作者: {{$document->author->name}}
            更新于: {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$document->updated_at)->diffForHumans()}}</h5>
        <hr>

        <article>
            <p>loading...</p>
        </article>

        <textarea name="" id="" cols="30" rows="10" hidden>{{$document->content}}</textarea>



    </div>

    <div  id="document-nav">
        <h5>上一篇:
            @if($prevDocument)
                <a href="{{url('home/document/detail/'.$prevDocument['id'])}}">{{$prevDocument['title']}}</a>
            @else
                已是第一篇
            @endif
        </h5>
        <h5><a href="{{url('home')}}">返回目录</a></h5>
        <h5>下一篇:
            @if($nextDocument)
                <a href="{{url('home/document/detail/'.$nextDocument['id'])}}">{{$nextDocument['title']}}</a>
            @else
                已是最后一篇
            @endif
        </h5>

        <div class="clearfix"></div>
    </div>

    {{--<div class="col-md-8 col-md-offset-2">
        <span  id="Maney">打赏</span>

    </div>
--}}

@append

@section('right-side')
    @include('home/statics_panel')
    @include('home/links')
@append