<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class MahasiswaController extends Controller
{
    public function store(Request $request)
        {
            $request->validate([
                'nim' => 'required|string|unique:mahasiswa,nim',
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:mahasiswa,email',
                'password' => 'required|string|min:6|confirmed',
            ]);

            $mahasiswa = Mahasiswa::create([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'message' => 'Mahasiswa berhasil ditambahkan',
                'data' => $mahasiswa
            ], 201);
        }
}
