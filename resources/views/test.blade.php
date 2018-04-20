<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('bootstrap-3.3.7-dist/js/bootstrap.min.js')}}"></script>
    {{--<script src="{{asset('highlight.js-master/src/highlight.js')}}"></script>--}}
    <script src="{{asset('simpleMDE/simplemde.min.js')}}"></script>



    {{--<link rel="stylesheet" href="{{asset('highlight.js-master/src/styles/github.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('simpleMDE/simplemde.min.css')}}">

    <script src="https://cdn.bootcss.com/highlight.js/9.12.0/highlight.min.js"></script>
    <link href="https://cdn.bootcss.com/highlight.js/9.12.0/styles/monokai-sublime.min.css" rel="stylesheet">


</head>
<body>

<div class="container">
    <article>

    </article>

    <textarea name="" id="" cols="30" rows="10"></textarea>
</div>


<script>
//    hljs.initHighlightingOnLoad();
    $(document).ready(function () {
        mde=new SimpleMDE();
        $('article').html(mde.markdown('# asdfj'));
    })
</script>


</body>
</html>