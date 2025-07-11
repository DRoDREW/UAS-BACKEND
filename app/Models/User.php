<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'nim',
        'password',
        'role', 
    ];
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
    public function jadwalAkademik()
    {
        return $this->hasMany(JadwalAkademik::class);
    }
}
