<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Support\Facades\Hash; // Hash facade tidak lagi dibutuhkan di sini jika mutator dihapus

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'nim', // Tambahkan 'nim' jika ingin bisa diisi massal (mass assignable)
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // HAPUS ATAU KOMENTARI MUTATOR INI:
    /*
    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::make($value);
        }
    }
    */

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Biarkan ini, ini akan menangani hashing secara otomatis
        ];
    }
}