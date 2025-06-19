<?php

namespace Database\Seeders;

use App\Models\JadwalAkademik;
use App\Models\User;
use Illuminate\Database\Seeder;

class JadwalAkademikSeeder extends Seeder
{
    public function run()
    {
        $user = User::where('email', 'akew.535240123@stu.untar.ac.id')->first();

        if ($user) {
            $jadwal = [
                [
                    'kode_mata_kuliah' => 'IF-535240123-01',
                    'nama_mata_kuliah' => 'Pemrograman Web',
                    'kelas' => 'A',
                    'nama_dosen' => 'Dr. John Doe',
                    'ruang' => 'Lab 301',
                    'kontak_dosen' => 'john.doe@lecturer.untar.ac.id',
                    'keterangan' => 'Praktikum Web Programming'
                ],
                [
                    'kode_mata_kuliah' => 'IF-535240123-02',
                    'nama_mata_kuliah' => 'Database Systems',
                    'kelas' => 'B',
                    'nama_dosen' => 'Dr. Jane Smith',
                    'ruang' => 'Lab 302',
                    'kontak_dosen' => 'jane.smith@lecturer.untar.ac.id',
                    'keterangan' => 'Database Management System'
                ],
                [
                    'kode_mata_kuliah' => 'IF-535240123-03',
                    'nama_mata_kuliah' => 'Mobile Programming',
                    'kelas' => 'A',
                    'nama_dosen' => 'Prof. Robert Wilson',
                    'ruang' => 'Lab 303',
                    'kontak_dosen' => 'robert.wilson@lecturer.untar.ac.id',
                    'keterangan' => 'Android Development'
                ],
                [
                    'kode_mata_kuliah' => 'IF-535240123-04',
                    'nama_mata_kuliah' => 'Artificial Intelligence',
                    'kelas' => 'C',
                    'nama_dosen' => 'Dr. Maria Garcia',
                    'ruang' => 'Lab 304',
                    'kontak_dosen' => 'maria.garcia@lecturer.untar.ac.id',
                    'keterangan' => 'AI and Machine Learning'
                ]
            ];

            foreach ($jadwal as $item) {
                JadwalAkademik::create(array_merge(
                    $item,
                    ['user_id' => $user->id]
                ));
            }
        }
    }
}