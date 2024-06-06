<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\PermissionRole;
use App\Http\Controllers\RoleController;

class RoleController extends Controller
{
    public function list()
    {  
        $permissionRole = PermissionRole::getPermission('Role',Auth::user()->role_id);
        if(empty($permissionRole)){

            abort(404);
        }
        $data['permissionAdd'] = PermissionRole::getPermission('Add role',Auth::user()->role_id);
        $data['permissionEdit'] = PermissionRole::getPermission('Edit Role',Auth::user()->role_id);
        $data['permissionDelete'] = PermissionRole::getPermission('Delete Role',Auth::user()->role_id);
    $data['getRecord'] = Role::getRecord();
    return view('panel.role.list',$data);

}
public function add()
    {
        $getPermission = Permission::getRecord();
        $data['getPermission'] = $getPermission;
        return view('panel.role.add',$data);

}
public function insert(Request $request)
    {
//    dd($request->all());

    
       
        $save = new Role;
       
        $save->name = $request->name;
        $save->save();

        PermissionRole::InsertUpdateRecord($request->permission_id,$save->id);
        return redirect('panel/role')->with('success','Role successfully created');
    }

 public function edit($id)
    {
        $data['getRecord'] = Role::find($id);
       $data['getPermission'] = Permission::getRecord();
       $data['getRolePermission'] = PermissionRole::getRolePermission($id);
        
       
        return view('panel.role.edit',$data);
    }

    public function update($id,Request $request)
    {
        $save = Role::find($id);
        $save->name = $request->name;
        $save->save();

        PermissionRole::InsertUpdateRecord($request->permission_id,$save->id);
        return redirect('panel/role')->with('success','Role successfully updated');
    }

    public function delete($id,Request $request)
    {
        $save = Role::find($id);
        $save->delete();
        return redirect('panel/role')->with('success','Role successfully deleted');


        
    }

}


