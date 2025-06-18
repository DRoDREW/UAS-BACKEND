<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_name',
        'semester',
        'credit_hours',
        'grade',
        'grade_point'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}