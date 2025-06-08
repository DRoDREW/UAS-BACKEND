<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// Hash facade tidak lagi secara eksplisit dibutuhkan di sini jika model yang menangani hashing
// use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Pastikan UserFactory Anda (jika ada) juga tidak melakukan hashing manual
        // jika model sudah memiliki 'hashed' cast.
        // Biasanya, factory akan mengatur 'password' dengan plain text.
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'nim' => '12345601', 
            'password' => 'password123', // Berikan plain text password
        ]);

        User::factory()->create([
            'name' => 'Akew',
            'email' => 'akew.535240123@stu.untar.ac.id',
            'nim' => '535240123', // Contoh NIM
            'password' => 'akew123', // Berikan plain text password
        ]);
    }
}