<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'nama_pasien',
        'id_pasien',
        'keluhan',
        'nomor_handphone',
        'doctor_id',
        'jam',
        'status'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
