@extends('admin.admin')
@section('right-side')

    <style>
        .list-group{
            line-height: 30px;
            font-size: 18px;
        }

        .list-group>li:first-child,.list-group>li:last-child{
            border-radius: 0;
        }

        .list-group-item{
            padding-left: 20px;
        }

        .list-group-item>a,.list-group-item>span{
            font-size: 15px;
        }

        .list-group-item .badge{
            margin-top: -10px;
            margin-right: 10px;
        }






    </style>



    <h4 class="col-md-4" style="padding-left: 0">Document List:</h4>



    <form action="{{url('admin/document/index')}}" class="col-md-8" style="padding-right: 0" method="get">

        <div class="form-group col-md-6 pull-right" style="padding-right: 0">

            <div class="input-group">
                <input type="text" class="form-control" name="like">
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" value="Search">
                </span>
            </div>

        </div>
    </form>


    <div class="clearfix"></div>


    <hr>



    <ul class="list-group">
        @foreach($documents as $document)
            <li class="list-group-item">
                {{$document->title}}

                <br>

                <a href="{{url('admin/document/delete/'.$document->id)}}" onclick="return confirm('确定删除？');">Delete</a>
                @if(Auth::guard('admin')->user()->can('edit',$document))
                <a href="{{url('admin/document/edit/'.$document->id)}}">Edit</a>
                @endif
                <span>Updated_at:{{$document->updated_at}}</span>

                <span class="badge">{{$document->documentcate->name}}</span>

            </li>
        @endforeach
    </ul>

    {{$documents->appends(['like'=>$like])->links()}}
@append