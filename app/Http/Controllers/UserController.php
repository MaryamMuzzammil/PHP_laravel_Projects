<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function list()
    {
        // Fetch users along with their associated roles
       
        $data['getRecord'] = User::getRecord();
        return view('panel.user.list', $data);
    }


    public function add()
    {
        $data['getRole'] = Role::getRecord();
        return view('panel.user.add',$data);
    }


    public function insert(Request $request)
    {
        $user = new User;  
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->save();
        return redirect('panel/user')->with('success','User successfully created');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::find($id);  
        $data['getRole'] = Role::get();  
        return view('panel.user.edit',$data);
    }

    public function update($id,Request $request)
    {
        $user = User::find($id);
        $user->name = $request->name;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);  
        }
        $user->role_id = $request->role_id;
        $user->save();

        // PermissionRole::InsertUpdateRecord($request->permission_id,$save->id);
        
        return redirect('panel/user')->with('success','User successfully updated');
    }

    public function delete($id,Request $request)
    {
        $save = User::find($id);
        $save->delete();
        return redirect('panel/user')->with('success','User successfully deleted');


        
    }
}
