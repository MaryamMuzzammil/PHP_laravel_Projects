<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

class AuthController extends Controller
{
    public function login()
    {
        if(!empty(Auth::check())){

            return redirect()->route('panel.dashboard');
        }
        return view('layout.login');
    }
    public function authLogin(Request $request)
    {
        // $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email,'password' => $request->password])){

            return redirect()->route('panel.dashboard');
        }else{

            return redirect()->back()->with('error','Please enter correct credentials');
        }
    }
    public function logout()
    {
        Auth::logout();
        // return redirect()->route('layout.login');
        return redirect(url('/login'));
    }
}
