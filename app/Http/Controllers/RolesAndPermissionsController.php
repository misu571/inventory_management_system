<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsController extends Controller
{
    public function index()
    {
        $roles = auth()->user()->hasRole(Role::findById(1)->name) ? Role::all() : Role::whereNotIn('id', [1])->get();
        $permissions = Permission::all();
        return view('pages.setting.role_permission.index', compact('roles', 'permissions'));
    }

    public function roleStore(Request $request)
    {
        request()->validate(['role_name' => 'required|string|unique:roles,name|max:50']);

        Role::create(['name' => strtolower($request->role_name)]);
        $alert = (object) ['status' => 'success', 'message' => 'New role has been created'];

        return redirect()->route('setting.role-permission.index')->with(compact('alert'));
    }

    public function roleEdit(Role $role)
    {
        if ($role->id < 3) {
            return redirect()->route('setting.role-permission.index');
        }

        return view('pages.setting.role_permission.role_edit', compact('role'));
    }

    public function roleUpdate(Request $request, Role $role)
    {
        if ($role->id < 3) {
            return redirect()->route('setting.role-permission.index');
        }

        request()->validate(['name' => ['required', 'string', 'unique:roles', 'max:50']]);

        $role->update(['name' => strtolower($request->name)]);
        $alert = (object) ['status' => 'success', 'message' => 'Role has been updated'];

        return redirect()->route('setting.role-permission.index')->with(compact('alert'));
    }

    public function roleDestroy(Role $role)
    {
        if ($role->id < 3) {
            return redirect()->route('setting.role-permission.index');
        }

        try {
            $role->delete();
            $alert = (object) ['status' => 'success', 'message' => 'Role has been deleted'];
        } catch (\Exception $e) {
            $alert = (object) ['status' => 'danger', 'message' => 'One or more record is being used'];
        }

        return back()->with(compact('alert'));
    }

    public function permissionStore(Request $request)
    {
        request()->validate(['permission_name' => 'required|string|unique:permissions,name|max:50']);

        Permission::create(['name' => strtolower($request->permission_name)]);
        $alert = (object) ['status' => 'success', 'message' => 'New permission has been created'];

        return redirect()->route('setting.role-permission.index')->with(compact('alert'));
    }

    public function permissionEdit(Permission $permission)
    {
        return view('pages.setting.role_permission.permission_edit', compact('permission'));
    }

    public function permissionUpdate(Request $request, Permission $permission)
    {
        request()->validate(['name' => ['required', 'string', 'unique:permissions', 'max:50']]);

        $permission->update(['name' => strtolower($request->name)]);
        $alert = (object) ['status' => 'success', 'message' => 'Permission has been updated'];

        return redirect()->route('setting.role-permission.index')->with(compact('alert'));
    }

    public function permissionDestroy(Permission $permission)
    {
        try {
            $permission->delete();
            $alert = (object) ['status' => 'success', 'message' => 'Permission has been deleted'];
        } catch (\Exception $e) {
            $alert = (object) ['status' => 'danger', 'message' => 'One or more record is being used'];
        }

        return back()->with(compact('alert'));
    }
}
