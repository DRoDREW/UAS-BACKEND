<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalAkademik;
use Illuminate\Http\Request;


class JadwalController extends Controller
{

    public function index()
    {
        $jadwal = JadwalAkademik::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.jadwal', compact('jadwal'));
    }
}