<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'image',
    ];
}
