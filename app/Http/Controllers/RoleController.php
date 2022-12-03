<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = auth()->user()->hasRole('super-admin') ? Role::oldest()->get() : Role::whereNotIn('id', [1])->oldest()->get();
        return view('pages.setting.role.index', compact('roles'));
    }

    public function store(Request $request)
    {
        request()->validate(['name' => ['required', 'string', 'unique:roles', 'max:50']]);

        Role::create(['name' => strtolower($request->name)]);
        $alert = (object) ['status' => 'success', 'message' => 'New record has been created'];

        return redirect()->route('setting.role.index')->with(compact('alert'));
    }

    public function edit(Role $role)
    {
        return view('pages.setting.role.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        request()->validate(['name' => ['required', 'string', 'unique:roles', 'max:50']]);

        $role->update(['name' => strtolower($request->name)]);
        $alert = (object) ['status' => 'success', 'message' => 'Record has been updated'];

        return redirect()->route('setting.role.index')->with(compact('alert'));
    }

    public function destroy(Role $role)
    {
        try {
            $role->delete();
            $alert = (object) ['status' => 'success', 'message' => 'Record has been deleted'];
        } catch (\Exception $e) {
            $alert = (object) ['status' => 'danger', 'message' => 'One or more record is being used with this category'];
        }

        return back()->with(compact('alert'));
    }
}
