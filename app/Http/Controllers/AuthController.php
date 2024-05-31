<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if(!empty(Auth::check())){

            return redirect('panel/dashboard');
        }
        return view('auth.login');
    }

    public function authLogin(Request $request)
    {
        // $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email,'password' => $request->password])){

            return redirect('panel/dashboard');
        }else{

            return redirect()->back()->with('error','Please enter correct credentials');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }
}
