<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable=['documentcate_id','author_id','title','publish_at','top','content'];


    public function documentcate()
    {
        return $this->belongsTo('App\Documentcate');

    }

    /*
     * author
     * */
    public function author()
    {
        return $this->belongsTo('App\AdminUser');

    }
}
