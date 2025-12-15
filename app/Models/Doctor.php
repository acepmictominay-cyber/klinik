<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';

    protected $fillable = [
        'nama',
        'spesialisasi',
        'deskripsi',
        'foto',
        'gambar',
        'operating_hours',
        'no_telepon',
    ];

    protected $casts = [
        'operating_hours' => 'array',
    ];
}
