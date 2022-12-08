<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasAnyRole([Role::findById(1)->name, Role::findById(2)->name]) || auth()->user()->hasAnyDirectPermission(['role access', 'permission access'])) {
            $roles = auth()->user()->hasRole(Role::findById(1)->name) ? Role::all() : Role::whereNotIn('id', [1])->get();
            $permissions = Permission::all();
            return view('pages.setting.role_permission.index', compact('roles', 'permissions'));
        }
        
        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    public function roleStore(Request $request)
    {
        if (auth()->user()->hasAnyRole([Role::findById(1)->name, Role::findById(2)->name]) || auth()->user()->hasDirectPermission('role create')) {
            request()->validate(['role_name' => 'required|string|unique:roles,name|max:50']);

            Role::create(['name' => strtolower($request->role_name)]);
            $alert = (object) ['status' => 'success', 'message' => 'New role has been created'];

            return redirect()->route('setting.role-permission.index')->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    public function roleEdit(Role $role)
    {
        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        if ($role->id < 3) {
            return back()->with(compact('alert'));
        }

        if (auth()->user()->hasAnyRole([Role::findById(1)->name, Role::findById(2)->name]) || auth()->user()->hasDirectPermission('role edit')) {
            $permissions = Permission::whereNotIn('id', $role->permissions->pluck('id')->toArray())->get();

            return view('pages.setting.role_permission.role_edit', compact('role', 'permissions'));
        }

        return back()->with(compact('alert'));
    }

    public function roleUpdate(Request $request, Role $role)
    {
        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        if ($role->id < 3) {
            return back()->with(compact('alert'));
        }

        if (auth()->user()->hasAnyRole([Role::findById(1)->name, Role::findById(2)->name]) || auth()->user()->hasDirectPermission('role update')) {
            request()->validate(['name' => ['required', 'string', 'unique:roles', 'max:50']]);

            $role->update(['name' => strtolower($request->name)]);
            $alert = (object) ['status' => 'success', 'message' => 'Role has been updated'];

            return back()->with(compact('alert'));
        }

        return back()->with(compact('alert'));
    }

    public function roleDestroy(Role $role)
    {
        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        if ($role->id < 3) {
            return back()->with(compact('alert'));
        }

        if (auth()->user()->hasAnyRole([Role::findById(1)->name, Role::findById(2)->name]) || auth()->user()->hasDirectPermission('role delete')) {
            try {
                $role->delete();
                $alert = (object) ['status' => 'success', 'message' => 'Role has been deleted'];
            } catch (\Exception $e) {
                $alert = (object) ['status' => 'danger', 'message' => 'One or more record is being used'];
            }

            return back()->with(compact('alert'));
        }

        return back()->with(compact('alert'));
    }

    public function permissionStore(Request $request)
    {
        if (auth()->user()->hasAnyRole([Role::findById(1)->name, Role::findById(2)->name]) || auth()->user()->hasDirectPermission('permission create')) {
            request()->validate(['permission_name' => 'required|string|unique:permissions,name|max:50']);

            Permission::create(['name' => strtolower($request->permission_name)]);
            $alert = (object) ['status' => 'success', 'message' => 'New permission has been created'];

            return redirect()->route('setting.role-permission.index')->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    public function permissionUpdate(Request $request, Permission $permission)
    {
        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        if ($permission->id < 25) {
            return back()->with(compact('alert'));
        }
        
        if (auth()->user()->hasAnyRole([Role::findById(1)->name, Role::findById(2)->name]) || auth()->user()->hasDirectPermission('permission update')) {
            request()->validate(['name' => ['required', 'string', 'unique:permissions', 'max:50']]);

            $permission->update(['name' => strtolower($request->name)]);
            $alert = (object) ['status' => 'success', 'message' => 'Permission has been updated'];

            return redirect()->route('setting.role-permission.index')->with(compact('alert'));
        }

        return back()->with(compact('alert'));
    }

    public function permissionDestroy(Permission $permission)
    {
        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        if ($permission->id < 25) {
            return back()->with(compact('alert'));
        }
        
        if (auth()->user()->hasAnyRole([Role::findById(1)->name, Role::findById(2)->name]) || auth()->user()->hasDirectPermission('permission delete')) {
            try {
                $permission->delete();
                $alert = (object) ['status' => 'success', 'message' => 'Permission has been deleted'];
            } catch (\Exception $e) {
                $alert = (object) ['status' => 'danger', 'message' => 'One or more record is being used'];
            }

            return back()->with(compact('alert'));
        }

        return back()->with(compact('alert'));
    }

    public function permissionAssignRole(Request $request, Role $role)
    {
        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        if ($role->id < 3) {
            return back()->with(compact('alert'));
        }

        if (auth()->user()->hasAnyRole([Role::findById(1)->name, Role::findById(2)->name]) || auth()->user()->hasDirectPermission('assign permission')) {
            // $permissions = Permission::get()->toArray();
            // $array1 = array("green", "red", "blue", "yellow");
            // $array2 = array("green", "yellow", "red");
            // $result = array_intersect($array1, $array2);
            // dd($result);
            $permissionArray = [];
            $arr = explode(',', $request->permissions);
            foreach ($arr as $value) {
                try {
                    array_push($permissionArray, Permission::findById($value)->name);
                } catch (\Throwable $th) {
                    $alert = (object) ['status' => 'danger', 'message' => 'Wrong permission data!'];
                    return redirect()->route('setting.role-permission.index')->with(compact('alert'));
                }
            }
            $role->givePermissionTo($permissionArray);
            $alert = (object) ['status' => 'success', 'message' => 'Permission(s) has been assigned'];

            return back()->with(compact('alert'));
        }

        return back()->with(compact('alert'));
    }

    public function permissionAssignRoleDestroy(Request $request, Role $role, Permission $permission)
    {
        if (auth()->user()->hasAnyRole([Role::findById(1)->name, Role::findById(2)->name]) || auth()->user()->hasDirectPermission('revoke permission')) {
            $role->revokePermissionTo(Permission::findById($permission->id)->name);
            $alert = (object) ['status' => 'success', 'message' => 'Permission has been revoked'];

            return back()->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }
}
