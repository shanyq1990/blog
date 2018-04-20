<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentcate extends Model
{
    //

    protected $fillable=['name','enname'];

    public function documents()
    {
        return $this->hasMany('App\Document');

    }


    public function delete()
    {

        /*
         * delete associated document
         * */
        foreach ($this->documents as $document){
            $document->delete();
        }

        return parent::delete();

    }
}
