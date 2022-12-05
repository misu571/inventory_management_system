<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
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
        $employees = DB::table('employees')
            ->join('users', 'employees.user_id', '=', 'users.id')
            ->select('employees.*', 'users.name', 'users.email', 'users.phone', 'users.image')
            ->orderByDesc('employees.updated_at')->get()->toArray();
        
        return view('pages.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::whereNotIn('id', [1])->select('id', 'name')->get();
        return view('pages.employee.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $image = $request->hasFile('image') ? $this->storeFile('employees/avatar', $request->file('image')) : null;
        $password = Str::random(8);
        
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt('q1w2e3r4t5'),
                'phone' => $request->phone,
                'image' => $image
            ]);
            Employee::create([
                'user_id' => $user->id,
                'position' => $request->position,
                'nid' => $request->nid,
                'address' => $request->address
            ]);
            $user->assignRole(Role::findById($request->role)->name);
            DB::commit();
            $alert = (object) ['status' => 'success', 'message' => 'New record has been created'];
        } catch (\Exception $e) {
            $alert = (object) ['status' => 'danger', 'message' => 'Something went wrong!'];
            DB::rollback();
        }

        return redirect()->route('employee.index')->with(compact('alert'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
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
        $roles = Role::whereNotIn('id', [1])->select('id', 'name')->get();

        return view('pages.employee.show', compact('employee', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
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
        $user = User::find($employee->user_id);
        $role = Role::findById($request->role)->name;
        
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
                // 'email' => $request->email,
                'phone' => $request->phone
            ]);
            if ($user->getRoleNames()->first() != $role) {
                $user->assignRole($role);
            }
            DB::commit();
            $alert = (object) ['status' => 'success', 'message' => 'Record has been updated'];
        } catch (\Exception $e) {
            $alert = (object) ['status' => 'danger', 'message' => 'Something went wrong!'];
            DB::rollback();
        }

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
        DB::beginTransaction();
        try {
            $employee->delete();
            User::where('id', $employee->user_id)->delete();
            DB::commit();
            $alert = (object) ['status' => 'success', 'message' => 'Record has been deleted'];
        } catch (\Exception $e) {
            $alert = (object) ['status' => 'danger', 'message' => 'One or more record is being used with this category'];
            DB::rollback();
        }

        return back()->with(compact('alert'));
    }

    public function passwordUpdate(Request $request, Employee $employee)
    {
        request()->validate(['password' => 'required|string|min:8|confirmed']);

        User::where('id', $employee->user_id)->update(['password' => bcrypt($request->password)]);
        $alert = (object) ['status' => 'success', 'message' => 'Password has been updated'];

        return back()->with(compact('alert'));
    }

    public function imageUpdate(Request $request, Employee $employee)
    {
        request()->validate(['image' => 'sometimes|file|image|max:2000']);
        $image = $request->hasFile('image') ? $this->storeFile('employees/avatar', $request->file('image'), $employee->image) : null;
        User::where('id', $employee->user_id)->update(['image' => $image]);
        $alert = (object) ['status' => 'success', 'message' => 'Profile picture has been updated'];

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
