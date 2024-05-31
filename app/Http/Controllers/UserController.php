<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function register(Request $request){
        $data=$request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',

        ]);
        $data['password'] = bcrypt($data['password']);
        $user=DB::table('users')->insertGetId($data);
        if($user){
            return redirect()->route('login');
            
            
        }
    }
}
