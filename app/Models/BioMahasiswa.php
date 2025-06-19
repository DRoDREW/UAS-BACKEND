<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BioMahasiswa extends Model
{
    protected $table = 'bio_mahasiswa';
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'no_telepon',
        'alamat',
        'email',
        'created_at',
        'updated_at',
    ];
}
