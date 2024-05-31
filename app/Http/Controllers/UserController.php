<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(){
        return view('layout.index');
    }
    public function show_event(){
        return view('layout.event');
    }
    public function show_contact(){
        return view('layout.contact');
    }
    public function show_blogs(){
        return view('layout.blogs');
    }
    public function show_about(){
        return view('layout.about');
    }
    public function show_activity(){
        return view('layout.activity');
    }
    public function show_sermons(){
        return view('layout.sermons');
    }
    public function show_team(){
        return view('layout.team');
    }
    public function show_testimonial(){
        return view('layout.testimonial');
    }
    // public function show_login(){
    //     return view('layout.login');
    // }
    public function list()
{
    // Fetch users along with their associated roles
    $data['getRecord'] = User::join('roles', 'users.role_id', '=', 'roles.id')
                             ->select('users.*', 'roles.name as role_name')
                             ->get();
    
    return view('panel.user.list', $data);
}


public function test()
{
    // Fetch users along with their associated roles
    $data = User::join('roles', 'users.role_id', '=', 'roles.id')
                             ->select('users.*', 'roles.name as role_name')
                             ->get();
    
   return response()->json([

      'message' => 'users found',
      'status' => true,
      'data' => $data

   ],200);
}



    public function add()
    {
        $data['getRole'] = Role::get();
        return view('panel.user.add',$data);
    }

    public function insert(Request $request)
    {
        $save = new User;  
        $save->name = $request->name;
        $save->email = $request->email;
        $save->password = Hash::make($request->password);
        $save->role_id = $request->role_id;
        $save->save();
        return redirect('panel/role')->with('success','User successfully created');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::find($id);    
        return view('panel.user.edit',$data);
    }
}
