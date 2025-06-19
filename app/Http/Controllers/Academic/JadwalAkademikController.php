<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Models\JadwalAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalAkademikController extends Controller
{
    public function index()
    {
        $jadwalAkademik = JadwalAkademik::where('user_id', Auth::id())
            ->orderBy('kode_mata_kuliah')
            ->get();

        return view('academic.jadwal', compact('jadwalAkademik'));
    }
}