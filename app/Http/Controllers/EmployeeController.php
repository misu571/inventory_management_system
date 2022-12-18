<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Str;
use App\Mail\PasswordChange;
use Illuminate\Http\Request;
use App\Mail\NewUserRegistration;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->can('user access')) {
            $employees = User::join('employees', 'users.id', '=', 'employees.user_id')
                ->select(
                    'users.*',
                    'employees.id as employee_id',
                    'employees.position',
                    'employees.city',
                    'employees.address',
                    'employees.nid',
                    'employees.experience',
                    'employees.salary',
                    'employees.vacation'
                )->with('roles')->get();
            return view('pages.employee.index', compact('employees'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->can('user create')) {
            $roles = Role::whereNotIn('id', [1])->select('id', 'name')->get();
            return view('pages.employee.create', compact('roles'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        if (auth()->user()->can('user store')) {
            $image = $request->hasFile('image') ? $this->storeFile('employees/avatar', $request->file('image')) : null;
            $email = strtolower($request->email);
            $password = Str::random(11);
            
            DB::beginTransaction();
            try {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $email,
                    'password' => bcrypt($password),
                    'phone' => $request->phone,
                    'image' => $image
                ])->assignRole(Role::findById($request->role)->name);
                Employee::create([
                    'user_id' => $user->id,
                    'position' => $request->position,
                    'nid' => $request->nid,
                    'address' => $request->address,
                    'salary' => $request->salary
                ]);
                DB::commit();
                $alert = (object) ['status' => 'success', 'message' => 'New record has been created'];
                Mail::to($email)->send(new NewUserRegistration($request->name, $email, $password));
            } catch (\Exception $e) {
                $alert = (object) ['status' => 'danger', 'message' => 'Something went wrong!'];
                DB::rollback();
            }

            return redirect()->route('employee.index')->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        if (auth()->user()->can('user show')) {
            $employee = User::join('employees', 'users.id', '=', 'employees.user_id')->where('employees.id', $employee->id)
                ->select(
                    'users.*',
                    'employees.id as employee_id',
                    'employees.position',
                    'employees.city',
                    'employees.address',
                    'employees.nid',
                    'employees.experience',
                    'employees.salary',
                    'employees.vacation'
                )->first();

            return view('pages.employee.show', compact('employee'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return redirect()->route('employee.index');
        // $user = User::where('id', $employee->user_id)->first();
        
        // return view('pages.employee.edit', compact('employee', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        if (auth()->user()->can('user update')) {
            $user = User::find($employee->user_id);
            
            DB::beginTransaction();
            try {
                $employee->update([
                    'position' => $request->position,
                    'nid' => $request->nid,
                    'salary' => $request->salary,
                    'address' => $request->address
                ]);
                $user->update([
                    'name' => $request->name,
                    'phone' => $request->phone
                ]);
                DB::commit();
                $alert = (object) ['status' => 'success', 'message' => 'Record has been updated'];
            } catch (\Exception $e) {
                $alert = (object) ['status' => 'danger', 'message' => 'Something went wrong!'];
                DB::rollback();
            }

            return back()->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    public function rolesPermissionsShow(Employee $employee)
    {
        if (auth()->user()->can('role show')) {
            $rolesPermissions = [];
            $employee = User::join('employees', 'users.id', '=', 'employees.user_id')->where('employees.id', $employee->id)
                ->select(
                    'users.*',
                    'employees.id as employee_id',
                    'employees.position',
                    'employees.city',
                    'employees.address',
                    'employees.nid',
                    'employees.experience',
                    'employees.salary',
                    'employees.vacation'
                )->with('roles')->first();
            $roles = Role::whereNotIn('id', [1])->select('id', 'name')->get();
            array_push($rolesPermissions, array_map(function ($n) {
                return $n['id'];
            }, $employee->getPermissionsViaRoles()->toArray()));
            $permissions = Permission::whereNotIn('id', $rolesPermissions[0])->get();

            return view('pages.employee.roles_permissions_show', compact('employee', 'roles', 'permissions'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    public function rolesPermissionsAssign(Request $request, User $employee)
    {
        if (auth()->user()->can('role create')) {
            request()->validate(['role_name' => 'required|exists:roles,id']);

            $role = Role::findById($request->role_name)->name;
            if ($employee->hasRole($role)) {
                $alert = (object) ['status' => 'warning', 'message' => 'Role already exists!'];
            } else {
                $employee->assignRole($role);
                $alert = (object) ['status' => 'success', 'message' => 'Role has been assigned'];
            }

            return back()->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    public function rolesPermissionsDestroy(User $employee, Role $role)
    {
        if (auth()->user()->can('role delete')) {
            $employee->removeRole(Role::findById($role->id)->name);
            $alert = (object) ['status' => 'success', 'message' => 'Role has been revoked'];

            return back()->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    public function rolesPermissionsDirectAssign(Request $request, User $employee)
    {
        if (auth()->user()->can('permission create')) {
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
            $employee->givePermissionTo($permissionArray);
            $alert = (object) ['status' => 'success', 'message' => 'Permission(s) has been assigned'];

            return back()->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    public function rolesPermissionsDirectDestroy(User $employee, Permission $permission)
    {
        if (auth()->user()->can('permission delete')) {
            $employee->revokePermissionTo(Permission::findById($permission->id)->name);
            $alert = (object) ['status' => 'success', 'message' => 'Permission has been revoked'];

            return back()->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if (auth()->user()->can('user destroy')) {
            DB::beginTransaction();
            try {
                $employee->delete();
                User::where('id', $employee->user_id)->delete();
                DB::commit();
                $alert = (object) ['status' => 'success', 'message' => 'Record has been deleted'];
            } catch (\Exception $e) {
                $alert = (object) ['status' => 'danger', 'message' => 'One or more record is being used'];
                DB::rollback();
            }

            return back()->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    public function emailUpdate(Request $request, Employee $employee)
    {
        if (auth()->user()->can('user update')) {
            request()->validate(['email' => 'required|email|unique:users,email']);

            User::where('id', $employee->user_id)->update(['email' => strtolower($request->email)]);
            $alert = (object) ['status' => 'success', 'message' => 'E-mail has been updated'];

            return back()->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    public function passwordUpdate(Request $request, Employee $employee)
    {
        if (auth()->user()->can('user update')) {
            request()->validate(['password' => 'required|string|min:8|confirmed']);

            $user = User::where('id', $employee->user_id)->first();
            $user->update(['password' => bcrypt($request->password)]);
            $alert = (object) ['status' => 'success', 'message' => 'Password has been updated'];
            Mail::to($user->email)->send(new PasswordChange($user->name, $user->email, $request->password));

            return back()->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    public function imageUpdate(Request $request, Employee $employee)
    {
        if (auth()->user()->can('user update')) {
            request()->validate(['image' => 'sometimes|file|image|max:2000']);
            $image = $request->hasFile('image') ? $this->storeFile('employees/avatar', $request->file('image'), $employee->image) : null;
            User::where('id', $employee->user_id)->update(['image' => $image]);
            $alert = (object) ['status' => 'success', 'message' => 'Profile picture has been updated'];

            return back()->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    private function storeFile(string $location, $file, $replace = null)
    {
        try {
            $name = $file->hashName();
            $file->storeAs($location, $name, 'public');
            if ($replace) {
                Storage::disk('public')->delete($location . '/' . $replace);
            }
            return $name;
        } catch (\Exception $th) {
            $alert = (object) ['status' => 'warning', 'message' => 'Something went wrong, file not uploaded'];
            return back()->with(compact('alert'));
        }
    }
}
