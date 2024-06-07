<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\PermissionRole;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;


class RoleController extends Controller
{
    public function list(Request $request)
    {  
        $permissionRole = PermissionRole::getPermission('Role', Auth::user()->role_id);
        if (empty($permissionRole)) {
            abort(404);
        }

        $query = Role::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        $roles = $query->paginate(5);

        $data['permissionAdd'] = PermissionRole::getPermission('Add role', Auth::user()->role_id);
        $data['permissionEdit'] = PermissionRole::getPermission('Edit Role', Auth::user()->role_id);
        $data['permissionDelete'] = PermissionRole::getPermission('Delete Role', Auth::user()->role_id);
        $data['getRecord'] = $roles;

        return view('panel.role.list', $data);
    
    }

    public function add()
    {   
        $permissionRole = PermissionRole::getPermission('Add Role', Auth::user()->role_id);
        if (empty($permissionRole)) {
            abort(404);
        }
        $getPermission = Permission::getRecord();
        $data['getPermission'] = $getPermission;
        return view('panel.role.add', $data);
    }

    public function insert(Request $request)
    {
        $permissionRole = PermissionRole::getPermission('Add Role', Auth::user()->role_id);
        if (empty($permissionRole)) {
            abort(404);
        }
       
        $save = new Role;
        $save->name = $request->name;
        $save->save();

        PermissionRole::InsertUpdateRecord($request->permission_id, $save->id);
        return redirect('panel/role')->with('success', 'Role successfully created');
    }

    public function edit($id)
    {   
        $permissionRole = PermissionRole::getPermission('Edit Role', Auth::user()->role_id);
        if (empty($permissionRole)) {
            abort(404);
        }
        $data['getRecord'] = Role::find($id);
        $data['getPermission'] = Permission::getRecord();
        $data['getRolePermission'] = PermissionRole::getRolePermission($id);
        
        return view('panel.role.edit', $data);
    }

    public function update($id, Request $request)
    {
        $permissionRole = PermissionRole::getPermission('Edit Role', Auth::user()->role_id);
        if (empty($permissionRole)) {
            abort(404);
        }
        $save = Role::find($id);
        $save->name = $request->name;
        $save->save();

        PermissionRole::InsertUpdateRecord($request->permission_id, $save->id);
        return redirect('panel/role')->with('success', 'Role successfully updated');
    }

    public function delete($id, Request $request)
    {
        $permissionRole = PermissionRole::getPermission('Delete Role', Auth::user()->role_id);
        if (empty($permissionRole)) {
            abort(404);
        }
        $save = Role::find($id);
        $save->delete();
        return redirect('panel/role')->with('success', 'Role successfully deleted');
    }

}


