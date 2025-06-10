<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< Updated upstream

class AuthController extends Controller
{
    //
}
=======
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login mahasiswa
     */
    public function showLogin()
    {
        return view('posts.login');
    }

    /**
     * Proses login mahasiswa
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'min:8'],
        ], [
            'email.exists' => 'Email tidak terdaftar sebagai mahasiswa.',
            'password.min' => 'Password minimal 8 karakter.'
        ]);

        // Cek apakah user dengan email tersebut adalah mahasiswa
        $user = User::where('email', $credentials['email'])->first();

        if (!$user || $user->role !== 'mahasiswa') {
            return back()->withErrors([
                'email' => 'Anda tidak terdaftar sebagai mahasiswa.',
            ])->onlyInput('email');
        }

        // Proses authentication
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirect berdasarkan role
            return redirect()->intended('/dashboard-mahasiswa');
        }

        return back()->withErrors([
            'password' => 'Password yang dimasukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Proses logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('status', 'Anda telah berhasil logout.');
    }

    /**
     * Dashboard mahasiswa
     */
    public function dashboard()
    {
        // Pastikan hanya mahasiswa yang bisa akses
        if (Auth::check() && Auth::user()->role === 'mahasiswa') {
            return view('mahasiswa.dashboard', [
                'mahasiswa' => Auth::user()
            ]);
        }

        return redirect('/login')->with('error', 'Akses ditolak.');
    }
}
>>>>>>> Stashed changes
