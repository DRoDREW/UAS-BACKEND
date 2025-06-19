<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Check role and redirect accordingly
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Regular user redirect
        return redirect()->route('dashboard');
    }

    return back()->withErrors([
        'email' => 'Invalid credentials.'
    ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('status', 'Anda telah berhasil logout.');
    }

    public function dashboard()
    {
        if (Auth::check() && Auth::user()->role === 'mahasiswa') {
            return view('mahasiswa.dashboard', [
                'mahasiswa' => Auth::user()
            ]);
        }

        return redirect('/login')->with('error', 'Akses ditolak.');
    }
}
