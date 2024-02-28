<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    public function index()
    {
        if (!auth()->user()->can('list roles')) {
            abort(403, 'Unauthorized');
        }

        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }
    public function edit($id)
    {
        if (!auth()->user()->can('edit roles')) {
            abort(403, 'Unauthorized');
        }
        $role = Role::findById($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions()->pluck('id')->toArray();

        return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {  
        if (!auth()->user()->can('update roles')) {
            abort(403, 'Unauthorized');
        }
        // Retrieve the role by ID
        $role = Role::findById($id);
        
        // Retrieve the permissions from the request
        $permissionIds = $request->permissions;

        // Filter out any invalid permission IDs
        $validPermissionIds = Permission::whereIn('id', $permissionIds)->pluck('id')->toArray();
         
        // Sync the valid permissions with the role
        $role->syncPermissions($validPermissionIds);

        // Redirect back to the roles index page
        return back()->with('success', 'Permissions updated successfully');
    }
}