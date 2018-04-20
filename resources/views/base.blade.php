<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('bootstrap-3.3.7-dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/blog.js')}}"></script>
    <script src="{{asset('js/marked.js')}}"></script>
    <script src="{{asset('simpleMDE/simplemde.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/blog.css')}}">
    <link rel="stylesheet" href="{{asset('simpleMDE/simplemde.min.css')}}">



    <script src="{{asset('highlight/highlight.min.js')}}"></script>
    <link href="{{asset('highlight/style/github.min.css')}}" rel="stylesheet">
{{--    <link href="{{asset('highlight/style/monokai-sublime.min.css')}}" rel="stylesheet">--}}


    <title>Mr.Shan Note</title>
</head>
<body>

@yield('nav')




@yield('content')




</body>
</html>