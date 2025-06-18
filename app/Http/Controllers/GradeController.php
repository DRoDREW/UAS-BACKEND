<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $grades = Grade::where('user_id', $user->id)
                      ->orderBy('semester', 'desc')
                      ->get()
                      ->groupBy('semester');

        return view('academic.Grade', [
            'grades' => $grades,
            'user' => $user
        ]);
    }
}