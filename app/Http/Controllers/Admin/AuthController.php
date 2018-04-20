<?php

namespace App\Http\Controllers\Admin;

use App\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    /*
     * show login form
     * */
    public function login()
    {
        return view('admin.auth.login');
    }
    /*
     * process login
     * */
    public function processLogin(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'password'=>'required'
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator);
        }

        if(!$user=AdminUser::where('name',$request->input('name'))){
            return back()->withErrors('User doesn\'t exist!');
        }

        $crendital=$request->only('name','password');
        $remember=$request->has('remember_me')?true:null;

        if(!$this->guard()->attempt($crendital,$remember)){
            return back()->withErrors('Password is wrong!');
        }

        return redirect()->to('admin');
    }

    /*
     * logout
     * */
    public function logout()
    {
        $this->guard()->logout();

        return redirect()->to('admin');
    }
    /*
     * admin guard
     * */
    private function guard()
    {
        return Auth::guard('admin');
    }
}
