<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\Academic\BiodataController;
use App\Http\Controllers\AdminMahasiswaController;

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Academic routes
    Route::prefix('academic')->group(function () {
        Route::get('/grades', [GradeController::class, 'index'])->name('grades');
        Route::get('/biodata', [BiodataController::class, 'index'])->name('biodata');
        Route::get('/schedule', function() { return view('academic.schedule'); })->name('schedule');
        Route::get('/payment', function() { return view('academic.payment'); })->name('payment');
        Route::get('/calendar', function() { return view('academic.calendar'); })->name('academic-calendar');
    });

    Route::resource('posts', PostController::class);
});

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('mahasiswa', AdminMahasiswaController::class);
    });
});

// Register admin middleware
app('router')->aliasMiddleware('admin', \App\Http\Middleware\AdminMiddleware::class);