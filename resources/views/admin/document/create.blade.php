@extends('admin.admin')
@section('right-side')

    {{--@include('UEditor::head')--}}


    <script>
        $(document).ready(function () {
            var simplemde=new SimpleMDE({
                element:$('#content')[0],
                renderingConfig: {
                    singleLineBreaks: false,
                    codeSyntaxHighlighting: true
                },
                toolbar:[
                    "bold", "italic", "heading", "|", "quote", "code", "table",
                    "horizontal-rule", "unordered-list", "ordered-list", "|",
                    "link", "image", "|",  "side-by-side", 'fullscreen','|',
                    {
                        name: "guide",
                        action: function customFunction(editor){
                            var win = window.open('https://github.com/riku/Markdown-Syntax-CN/blob/master/syntax.md', '_blank');
                            if (win) {
                                //Browser has allowed it to be opened
                                win.focus();
                            } else {
                                //Browser has blocked it
                                alert('Please allow popups for this website');
                            }
                        },
                        className: "fa fa-info-circle",
                        title: "Markdown 语法！"
                    }
                ]
            });


        })
    </script>

    <style>
        #content-realtime{
            background-color: rgba(218,218,218,0.5);
            border: rgba(100,100,100,0.99);
            min-height: 50px;
            border-radius: 5px;
            padding: 20px 10px;
        }
    </style>

    <h4>Create Document:</h4>
    <hr>
    <form action="{{url('admin/document/create')}}"  method="post">

        {{csrf_field()}}

        <div class="form-group">
            <label for="documentcate_id">Documentcate:</label>
            <select name="documentcate_id" id="" class="form-control">
                @foreach($documentcates as $documentcate)
                    <option value="{{$documentcate->id}}">{{$documentcate->name}}</option>
                    @endforeach
            </select>
        </div>

        {{--<div class="form-group hidden">
            <label for="author_id">Author:</label>
            <input type="text" name="author_id" class="form-control" value="{{ Auth::guard('admin')->user()->id }}" readonly>
        </div>--}}

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="publish_at">Publish_at:</label>
            <input type="datetime-local" name="publish_at" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m-d\TH:s')}}">
        </div>



        <div class="checkbox" style="margin: 30px 0;">
            <label for="top">

            <input type="checkbox" name="top" value="1">
                Top
            </label>
        </div>



        <div class="form-group">
            <label for="content">Content:</label>

            <textarea name="content" id="content" cols="30" rows="10" class="form-control "></textarea>

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