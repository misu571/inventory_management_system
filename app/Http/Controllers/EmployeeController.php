<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
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
            ->select(
                'employees.*',
                'users.name',
                'users.email',
                'users.phone',
                'users.image'
            )
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
        return view('pages.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt('q1w2e3r4t5'),
                'phone' => $request->phone
            ]);
            Employee::create([
                'user_id' => $user->id,
                'position' => $request->position,
                'nid' => $request->nid,
                'address' => $request->address
            ]);
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
        return view('pages.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $user = User::where('id', $employee->user_id)->first();
        
        return view('pages.employee.edit', compact('employee', 'user'));
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
        DB::beginTransaction();
        try {
            $employee->update([
                'position' => $request->position,
                'nid' => $request->nid,
                'salary' => $request->salary,
                'address' => $request->address
            ]);
            $user = User::where('id', $employee->user_id)->update([
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            User::where('id', $employee->user_id)->delete();
            $alert = (object) ['status' => 'success', 'message' => 'Record has been deleted'];
        } catch (\Exception $e) {
            $alert = (object) ['status' => 'danger', 'message' => 'One or more record is being used with this category'];
        }

        return back()->with(compact('alert'));
    }
}
