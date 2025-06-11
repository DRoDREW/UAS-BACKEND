<?php
namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Models\BioMahasiswa;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
{
    public function index()
    {
        // Ambil data bio mahasiswa berdasarkan email user yang login
        $user = Auth::user();
        $biodata = BioMahasiswa::where('email', $user->email)->first();

        return view('academic.biodata', compact('biodata'));
    }
}
