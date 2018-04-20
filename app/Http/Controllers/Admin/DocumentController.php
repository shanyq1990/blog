<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use App\Documentcate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    /*
     * document list
     * */
    public function index(Request $request)
    {
        if($like=$request->input('like',null)){
            $query=Document::where('title','like','%'.$like.'%');
        }else{
            $query=Document::query();
        }

        $documents=$query->orderBy('created_at','desc')->paginate(3);

        return view('admin.document.index')->with(compact('documents','like'));
    }
    /*
     * show create form
     * */
    public function create()
    {

        $documentcates=Documentcate::all();
        return view('admin.document.create')->with(compact('documentcates'));

    }
    
    /*
     * processCreate
     * */
    public function processCreate(Request $request)
    {

        $validator=Validator::make($request->all(),[
            'documentcate_id'=>'required',
//            'author_id'=>'required',
            'title'=>'required|min:3|unique:documents',
            'publish_at'=>'required',
            'content'=>'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        };

        $data=$request->all();
        $data['author_id']=Auth::guard('admin')->id();
        $data['top']=$request->has('top')?1:0;


        if(Document::create($data)){

            return redirect()->to('admin/document/index');

        }

        return back()->withErrors('Create Failed');
        
    }

    /*
     * document delete
     * */
    public function delete($id)
    {
        $document=Document::find($id);

        $document->delete();

        return redirect()->to('admin/document/index');
    }

    /*
     * show edit form
     * */
    public function edit($id)
    {
        $document=Document::find($id);

        $documentcates=Documentcate::all();

        return view('admin.document.edit')->with(compact('document','documentcates'));

    }

    public function processEdit(Request $request,$id)
    {

        $validator=Validator::make($request->all(),[
            'documentcate_id'=>'required',
//            'author'=>'required',
            'title'=>'required|min:3',
            'publish_at'=>'required',
            'content'=>'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        };

        $document=Document::find($id);

        $data=$request->all();
        $data['top']=$request->has('top')?1:0;

        if($document->update($data)){
            return redirect()->to('admin/document/index');
        }

        return back()->withErrors('Edit Failed!');
    }
}
