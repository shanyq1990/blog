<div class="panel panel-default text-center corner-radius">
    <div class="panel-heading">统计信息</div>
    <ul class="list-group sidebar-list">
        <li class="list-group-item">
            <a href="{{url('home?like=')}} {{$like or null}}" class='{{(isset($documentcate_id) and $documentcate_id)?'':'documentcate-selected'}}'>
                <span>全部</span>
                <span>共{{$documents_sum->count()}}篇</span>
                <div class="clearfix"></div>
            </a>
        </li>
        @foreach($documentcates as $documentcate)
            <li class="list-group-item">
                <a href="{{url('home?like=')}} {{$like or null }} {{'&&documentcate_id='.$documentcate->id}}" class='{{(isset($documentcate_id) and $documentcate->id==$documentcate_id)?'documentcate-selected':''}}'>
                    <span>{{$documentcate->name}}</span>
                    <span>共{{$documentcate->documents->intersect($documents_sum)->count()}}篇</span>
                    <div class="clearfix"></div>
                </a>
            </li>
        @endforeach

        <div class="clearfix"></div>
    </ul>
</div>