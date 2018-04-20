<?php

namespace App\Http\Controllers\Home;

use App\Document;
use App\Documentcate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    /*
     * show document index
     * */
    public function index(Request $request)
    {

        $query=Document::query();

        if($like=$request->input('like',null)){
            $query=Document::where('title','like','%'.$like.'%');
        }



        $documents_sum=$query->get();


        if ($documentcate_id=$request->input('documentcate_id',null)){
            $query->where('documentcate_id',$documentcate_id);
        }



        $documents=$query->orderBy('created_at','desc')->paginate(8);

        //get documentcates

        $documentcates=Documentcate::all();



        return view('home.index')->with(compact('documents','like','documentcate_id','documentcates','documents_sum'));

    }

    /*
     * article detail
     * */

    public function detail($id)
    {
        $documents=Document::orderBy('created_at','desc')->get()->toArray();
        reset($documents);
        while (current($documents)['id']!=$id){
            next($documents);
        }

        $nextDocument=key_exists(key($documents)+1,$documents)?$documents[key($documents)+1]:null;
        $prevDocument=key_exists(key($documents)-1,$documents)?$documents[key($documents)-1]:null;

        $document=Document::find($id);


        $documents_sum=Document::all();
        $documentcates=Documentcate::all();

        return view('home.detail')->with(compact('document','nextDocument','prevDocument','documentcates','documents_sum'));

    }
}
