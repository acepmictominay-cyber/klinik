<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClinicProfile extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'description',
        'image',
        'operating_hours',
    ];

    protected $casts = [
        'operating_hours' => 'array',
    ];
}
