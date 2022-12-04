<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('pages.setting.permission.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        request()->validate(['name' => ['required', 'string', 'unique:permissions', 'max:50']]);

        Permission::create(['name' => strtolower($request->name)]);
        $alert = (object) ['status' => 'success', 'message' => 'New record has been created'];

        return redirect()->route('setting.permission.index')->with(compact('alert'));
    }

    public function edit(Permission $permission)
    {
        return view('pages.setting.permission.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        request()->validate(['name' => ['required', 'string', 'unique:permissions', 'max:50']]);

        $permission->update(['name' => strtolower($request->name)]);
        $alert = (object) ['status' => 'success', 'message' => 'Record has been updated'];

        return redirect()->route('setting.permission.index')->with(compact('alert'));
    }

    public function destroy(Permission $permission)
    {
        try {
            $permission->delete();
            $alert = (object) ['status' => 'success', 'message' => 'Record has been deleted'];
        } catch (\Exception $e) {
            $alert = (object) ['status' => 'danger', 'message' => 'One or more record is being used with this category'];
        }

        return back()->with(compact('alert'));
    }
}
