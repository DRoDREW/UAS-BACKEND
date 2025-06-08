<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller 
{ 
    public function __construct()
    {
        
    }

    public function showLogin() 
    { 
        return view('login'); 
    } 
 
    public function login(Request $request) 
    { 
        try {
            $credentials = $request->validate([ 
                'email' => ['required', 'email'], 
                'password' => ['required'], 
            ]); 

            // Check if user exists
            $user = \App\Models\User::where('email', $credentials['email'])->first();
            
            if (!$user || !Hash::check($credentials['password'], $user->password)) {
                throw ValidationException::withMessages([
                    'email' => 'These credentials do not match our records.',
                ]);
            }

            // Login the user
            Auth::login($user);
            $request->session()->regenerate();
            
            return redirect()->intended('/posts')
                ->with('success', 'Login successful');

        } catch (ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput($request->except('password'));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')
            ->with('logout_success', true)
            ->with('success', 'You have been successfully logged out!');
    }
}