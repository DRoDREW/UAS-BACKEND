<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BioMahasiswaSeeder extends Seeder
{
    public function run()
    {
        DB::table('bio_mahasiswa')->insert([
            [
                'nama' => 'Budi Santoso',
                'nim' => '12345678',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-01-01',
                'jenis_kelamin' => 'L',
                'agama' => 'Islam',
                'no_telepon' => '081234567890',
                'alamat' => 'Jl. Merdeka No. 1, Jakarta',
                'email' => 'budi@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Aminah',
                'nim' => '87654321',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2001-02-02',
                'jenis_kelamin' => 'P',
                'agama' => 'Islam',
                'no_telepon' => '082345678901',
                'alamat' => 'Jl. Asia Afrika No. 2, Bandung',
                'email' => 'siti@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}