<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'nim',      // sudah ditambahkan agar mass assignable
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Hapus atau komentari mutator jika ingin menggunakan Laravel native hashing
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
            'password' => 'hashed', // Laravel native hashing
        ];
    }
}
