<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user()->hasRole('super-admin')
            ? auth()->user()
            : User::join('employees', 'users.id', '=', 'employees.user_id')->where('users.id', auth()->user()->id)
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
        
        return view('pages.profile.index', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        request()->validate([
            'name' => 'required|string',
            'phone' => 'required|string'
        ]);
        if (!auth()->user()->hasRole('super-admin')) {
            request()->validate(['address' => 'nullable|string|max:200']);
        }
        
        DB::beginTransaction();
        try {
            $user->update([
                'name' => $request->name,
                'phone' => $request->phone
            ]);
            if (!auth()->user()->hasRole('super-admin')) {
                Employee::where('user_id', $user->id)->update(['address' => $request->address]);
            }
            DB::commit();
            $alert = (object) ['status' => 'success', 'message' => 'Record has been updated'];
        } catch (\Exception $e) {
            $alert = (object) ['status' => 'danger', 'message' => 'Something went wrong!'];
            DB::rollback();
        }

        return back()->with(compact('alert'));
    }

    public function passwordUpdate(Request $request, User $user)
    {
        request()->validate([
            'old_password' => 'required|string|current_password',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user->update(['password' => bcrypt($request->password)]);
        $alert = (object) ['status' => 'success', 'message' => 'Password has been updated'];
        
        return back()->with(compact('alert'));
    }

    public function imageUpdate(Request $request, User $user)
    {
        request()->validate(['image' => 'sometimes|file|image|max:2000']);
        $image = $request->hasFile('image') ? $this->storeFile('employees/avatar', $request->file('image'), $user->image) : null;
        $user->update(['image' => $image]);
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
