<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BioMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminMahasiswaController extends Controller
{
    public function create()
    {
        return view('admin.mahasiswa_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:bio_mahasiswa,nim',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|string|max:50',
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'email' => 'required|email|unique:users,email|unique:bio_mahasiswa,email',
            'password' => 'required|string|min:6',
        ]);

        // Simpan ke tabel users
        $user = User::create([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'nim' => $validated['nim'],
            'password' => $validated['password'], // Sudah otomatis hash di model
        ]);

        // Simpan ke tabel bio_mahasiswa
        BioMahasiswa::create([
            'nama' => $validated['nama'],
            'nim' => $validated['nim'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'agama' => $validated['agama'],
            'no_telepon' => $validated['no_telepon'],
            'alamat' => $validated['alamat'],
            'email' => $validated['email'],
        ]);

        return redirect()->route('admin.mahasiswa.create')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }
}
