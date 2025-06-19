<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data posts dulu jika ingin hapus users (opsional)
        // DB::table('posts')->delete();

        // Hapus data users dan bio_mahasiswa tanpa truncate
        User::query()->delete();
        DB::table('bio_mahasiswa')->delete();

        // (Opsional) Reset auto increment
        // DB::statement('ALTER TABLE users AUTO_INCREMENT = 1');
        // DB::statement('ALTER TABLE bio_mahasiswa AUTO_INCREMENT = 1');

        User::factory()->create([
            'name' => 'Akew',
            'email' => 'akew.535240123@stu.untar.ac.id',
            'nim' => '535240123',
            'password' => 'akew123',
        ]);

        $akew = User::where('email', 'akew.535240123@stu.untar.ac.id')->first();

        if ($akew) {
            DB::table('bio_mahasiswa')->insert([
                'nama' => $akew->name,
                'nim' => $akew->nim,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2002-03-04',
                'jenis_kelamin' => 'L',
                'agama' => 'Islam',
                'no_telepon' => '081234567890',
                'alamat' => 'Jl. Contoh No. 123, Jakarta',
                'email' => $akew->email,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Membuat user admin jika belum ada
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'nim' => 'ADMIN123',
            'password' => 'admin123',
            'role' => 'admin'
        ]);

        $this->call([
            GradesTableSeeder::class
        ]);
    }
}
