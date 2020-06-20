<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function doLogin()
    {
        return view('admin.login.index');
    }

    public function Login(Request $request)
    {
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            return redirect('/');
        }
        else {
            return 'Not Login';
        }
    }
}
