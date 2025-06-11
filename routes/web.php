<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Guest routes (for non-authenticated users)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected routes (for authenticated users)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('posts', PostController::class);

    Route::get('/schedule', function() { return view('academic.schedule'); })->name('schedule');
    Route::get('/biodata', function() { return view('academic.biodata'); })->name('biodata');
    Route::get('/grades', function() { return view('academic.grades'); })->name('grades');
    Route::get('/payment', function() { return view('academic.payment'); })->name('payment');
    Route::get('/academic-calendar', function() { return view('academic.calendar'); })->name('academic-calendar');
});