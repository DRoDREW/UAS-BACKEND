<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('name')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.mahasiswa_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'nim' => 'required|string|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,student'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        return view('admin.users-edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'nim' => ['required', Rule::unique('users')->ignore($user->id)],
            'role' => 'required|in:admin,student',
            'password' => 'nullable|string|min:8'
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim,
            'role' => $request->role
        ];

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        return redirect()->route('admin.dashboard')
            ->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        // Check if trying to delete own account
        if (Auth::id() === $user->id) {
            return back()->with('error', 'You cannot delete your own account');
        }

        // Check if last admin
        $adminCount = User::where('role', 'admin')->count();
        if ($user->role === 'admin' && $adminCount <= 1) {
            return back()->with('error', 'Cannot delete the last admin account');
        }

        $user->delete();
        return redirect()->route('admin.dashboard')
            ->with('success', 'User deleted successfully');
    }
}