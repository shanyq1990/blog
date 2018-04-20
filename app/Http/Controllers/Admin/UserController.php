<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /*
     * user index
     * */
    public function index()
    {
        $users=User::all();

        return view('admin.user.index')->with(compact('users'));

    }

    /*
     * delete user
     * */
    public function delete($id)
    {
        if($user=User::find($id)){
            $user->delete();
        }

        return redirect()->to('admin/user/index');

    }
}
