<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsController extends Controller
{
    public function index()
    {
        $roles = auth()->user()->hasRole('super-admin') ? Role::all() : Role::whereNotIn('id', [1])->get();
        $permissions = Permission::all();
        return view('pages.setting.role_permission.index', compact('roles', 'permissions'));
    }

    public function roleStore(Request $request)
    {
        request()->validate(['name' => ['required', 'string', 'unique:roles', 'max:50']]);

        Role::create(['name' => strtolower($request->name)]);
        $alert = (object) ['status' => 'success', 'message' => 'New role has been created'];

        return redirect()->route('setting.role.index')->with(compact('alert'));
    }

    public function edit(Role $role)
    {
        if ($role->id < 3) {
            return redirect()->route('setting.role.index');
        }

        return view('pages.setting.role.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        if ($role->id < 3) {
            return redirect()->route('setting.role.index');
        }

        request()->validate(['name' => ['required', 'string', 'unique:roles', 'max:50']]);

        $role->update(['name' => strtolower($request->name)]);
        $alert = (object) ['status' => 'success', 'message' => 'Role has been updated'];

        return redirect()->route('setting.role.index')->with(compact('alert'));
    }

    public function destroy(Role $role)
    {
        if ($role->id < 3) {
            return redirect()->route('setting.role.index');
        }

        try {
            $role->delete();
            $alert = (object) ['status' => 'success', 'message' => 'Role has been deleted'];
        } catch (\Exception $e) {
            $alert = (object) ['status' => 'danger', 'message' => 'One or more record is being used with this category'];
        }

        return back()->with(compact('alert'));
    }
}
