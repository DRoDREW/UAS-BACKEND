<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicCalendarController;

Route::middleware('api')->group(function () {
    Route::apiResource('academic-calendar', AcademicCalendarController::class);
});

