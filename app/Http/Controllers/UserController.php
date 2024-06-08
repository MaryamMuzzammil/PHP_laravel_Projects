<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PermissionRole;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
    //     $data=$request->validate([
    //         'name'=>'required',
    //         'email'=>'required|email',
    //         'password'=>'required',

    //     ]);
    //     $data['password'] = bcrypt($data['password']);
    //     $user=DB::table('users')->insertGetId($data);
    //     if($user){
    //         return redirect()->route('login');
            
            
    //     }
    $data = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Hash the password
    $data['password'] = bcrypt($data['password']);

    // Add role_id with a value of 4
    $data['role_id'] = 4;

    // Create the user using Eloquent ORM
    $user = User::create($data);
    
    // echo "<pre>";
    // print_r ($user);
    // echo "</pre>";
    // die;
    if ($user) {
        return redirect()->route('login');
    }
    }

    public function list(Request $request)
    {   
        $permissionUser = PermissionRole::getPermission('User',Auth::user()->role_id);
        if(empty($permissionUser)){

            abort(404);
        }
        $data['permissionAdd'] = PermissionRole::getPermission('Add User',Auth::user()->role_id);
        $data['permissionEdit'] = PermissionRole::getPermission('Edit User',Auth::user()->role_id);
        $data['permissionDelete'] = PermissionRole::getPermission('Delete User',Auth::user()->role_id);
      
        $search = $request->input('search');

        $data['search'] = $search;
        $data['getRecord'] = User::with('role')
                                 ->where('name', 'LIKE', "%{$search}%")
                                 ->orWhere('email', 'LIKE', "%{$search}%")
                                 ->paginate(10);
         $data['getRecord'] = User::getRecord();
        return view('panel.user.list', $data);
    }


    public function add()
    {  $permissionUser = PermissionRole::getPermission(' Add User',Auth::user()->role_id);
        if(empty($permissionUser)){

            abort(404);
        }
        $data['getRole'] = Role::getRecord();
        return view('panel.user.add',$data);
    }


    public function insert(Request $request)
    {   
        $permissionUser = PermissionRole::getPermission(' Add User',Auth::user()->role_id);
        if(empty($permissionUser)){

            abort(404);
        }
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
         $permissionUser = PermissionRole::getPermission('Edit User',Auth::user()->role_id);
        if(empty($permissionUser)){

            abort(404);
        }
        $data['getRecord'] = User::find($id);  
        $data['getRole'] = Role::get();  
        return view('panel.user.edit',$data);
    }

    public function update($id,Request $request)
    {   
        $permissionUser = PermissionRole::getPermission(' Edit User',Auth::user()->role_id);
        if(empty($permissionUser)){

            abort(404);
        }
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
        $permissionUser = PermissionRole::getPermission('Delete User',Auth::user()->role_id);
        if(empty($permissionUser)){

            abort(404);
        }
        $save = User::find($id);
        $save->delete();
        return redirect('panel/user')->with('success','User successfully deleted');


        
    }
}
