<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalAkademik;
use App\Models\User;

class JadwalAkademikSeeder extends Seeder
{
    public function run()
    {
        $adminId = User::where('role', 'admin')->first()->id;
        
        $jadwal = [
            [
                'user_id' => $adminId,
                'kode_mata_kuliah' => 'TIF1001',
                'nama_mata_kuliah' => 'Pemrograman Web Framework',
                'nama_dosen' => 'Budi Santoso, M.Kom',
                'kelas' => '5A',
                'ruang' => 'Lab Komputer 1',
                'kontak_dosen' => '081234567890',
                'keterangan' => 'Praktikum Web Framework Laravel',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => $adminId,
                'kode_mata_kuliah' => 'TIF1002',
                'nama_mata_kuliah' => 'Backend Development',
                'nama_dosen' => 'Dr. Andi Wijaya',
                'kelas' => '5B',
                'ruang' => 'Lab Komputer 2',
                'kontak_dosen' => '081234567891',
                'keterangan' => 'Teori dan Praktikum Backend',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        JadwalAkademik::insert($jadwal);
    }
}