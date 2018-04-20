<?php

namespace App\Http\Controllers\Home;

use App\Mail\UserActivate;
use App\User;
use App\User_activates;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /*
     * show register form
     * */
    public function register()
    {
        return view('home.auth.register');

    }

    /*
     * process register
     * */
    public function processRegister(Request $request)
    {
        /*
         * validate user info
         * */
        $validator=Validator::make($request->all(),[
            'name'=>'required|unique:users,name',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:6|confirmed'
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator);
        }

        /*
         * create user
         * */

        $id=$this->createUser($request->only('email','name','password'));

        /*
         * send activate email
         * */

        if($this->sendActivationCode($id)){
            return view('home.info')->with(['message'=>'Register success! please check your email.']);
        }else{
            User::find($id)->delete();
            return view('home.info')->with(['message'=>'Send email fail!']);
        }

    }

    /*
     * activate user
     * */
    public function activate($code)
    {
        $user_activate=User_activates::where('code',$code)->first();

        if(!$user_activate){
            return view('home.info')->with(['message'=>'User doesn\'t  exit .' ]);
        }

        if(Carbon::createFromFormat('Y-m-d H:i:s',$user_activate->expire_time)->lt(Carbon::now())){
            return view('home.info')->with(['message'=>'the code is invalidate']);
        }


        $user_activate->user->activation=true;
        $user_activate->user->save();
        $user_activate->delete();

        /*
         * User login
        */
        Auth::login($user_activate->user);


        return view('home.info')->with(['message'=>'Your account has activated!']);

    }
    /*
     * show login form
     * */
    public function login()
    {
        return view('home.auth.login');
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

        if(!$user=User::where('name',$request->input('name'))){
            return back()->withErrors('User doesn\'t exist!');
        }

        $crendital=$request->only('name','password');
        $crendital['activation']=true;
        $remember=$request->has('remember_me')?true:null;

        if(!Auth::attempt($crendital,$remember)){
            return back()->withErrors('Password is wrong! or Account its\'t activated');
        }

        return redirect()->to('home');
    }

    /*
     * logout
     * */
    public function logout()
    {
        Auth::logout();

        return redirect()->to('home');
    }

    /*
     * create user
     * */
    private function createUser($crendital)
    {
        $user=new User();
        $user->email=$crendital['email'];
        $user->name=$crendital['name'];
        $user->password=bcrypt($crendital['password']);

        $user->save();

        return $user->id;

    }

    /*
     * send activate email
     * */
    private function sendActivationCode($user_id)
    {
        $user=User::find($user_id);
        /*
         * create user_activate
         * */

        $user_activate=new User_activates();
        $user_activate->user_id=$user_id;
        $user_activate->code=str_random(16);
        $user_activate->expire_time=Carbon::now()->addHour(1);
        $user_activate->save();

        /*
         * send email
         * */

        if(Mail::to($user->email)->send(new UserActivate($user_activate->code))){
            $user_activate->delete();
            return false;
        }

        return true;


    }


}
