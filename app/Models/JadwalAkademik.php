<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalAkademik extends Model
{
    use HasFactory;

    protected $table = 'jadwal_akademik';

    protected $fillable = [
        'user_id',
        'kode_mata_kuliah',
        'nama_mata_kuliah',
        'kelas',
        'nama_dosen',
        'ruang',
        'kontak_dosen',
        'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}