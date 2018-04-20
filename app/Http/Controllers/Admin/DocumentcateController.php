<?php

namespace App\Http\Controllers\Admin;

use App\Documentcate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DocumentcateController extends Controller
{
    /*
     * documentcate index
     * */
    public function index()
    {
        $documentcates=Documentcate::all();

        return view('admin.documentcate.index')->with(compact('documentcates'));

    }

    /*
     *show  create documentcate form
     * */
    public function create()
    {
        return view('admin.documentcate.create');

    }

    /*
     * process create
     * */
    public function processCreate(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|min:3|unique:documentcates',
            'enname'=>'required|min:3|unique:documentcates',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        if(Documentcate::create($request->all())){

            return redirect()->to('admin/documentcate/index');
        }

        return back()->withErrors('Create Failed');

    }

    /*
     * edit documentcate
     * */
    public function edit($id)
    {
        $documentcate=Documentcate::find($id);


        return view('admin.documentcate.edit')->with(compact('documentcate'));
    }

    /*
     * process edit
     * */
    public function processEdit(Request $request,$id)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|min:3',
            'enname'=>'required|min:3',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }



        $documentcate=Documentcate::find($id);

        if($documentcate->update($request->all())){
            return redirect()->to('admin/documentcate/index');
        }

        return back()->withErrors('Edit failed!');

    }

    /*
     * documentcate delete
     * */
    public function delete($id)
    {
        Documentcate::find($id)->delete();

        return back();
    }
}
