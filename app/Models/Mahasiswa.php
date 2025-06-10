<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    protected $primaryKey = 'nim';
    public $incrementing = false; // karena NIM bukan auto-increment
    protected $keyType = 'string';

    protected $fillable = [
        'nim', 'nama', 'email', 'password'
    ];

    protected $hidden = ['password'];
}
