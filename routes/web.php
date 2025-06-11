<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

// Redirect root to login if not authenticated
Route::get('/', function () {
    return redirect()->route('login');
});

// Guest routes (for non-authenticated users)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected routes (for authenticated users)
Route::middleware('auth')->group(function () {
    // Dashboard route
    Route::get('/dashboard', function() {
        return view('posts.index');
    })->name('dashboard');

    // Authentication
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Academic routes
    Route::prefix('academic')->group(function () {
        Route::get('/schedule', function() { 
            return view('academic.schedule'); 
        })->name('schedule');
        
        Route::get('/biodata', function() { 
            return view('academic.biodata'); 
        })->name('biodata');
        
        Route::get('/grades', function() { 
            return view('academic.grades'); 
        })->name('grades');
        
        Route::get('/payment', function() { 
            return view('academic.payment'); 
        })->name('payment');
        
        Route::get('/calendar', function() { 
            return view('academic.calendar'); 
        })->name('academic-calendar');
    });

    // Posts resource routes
    Route::resource('posts', PostController::class);
});