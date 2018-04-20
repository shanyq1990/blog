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