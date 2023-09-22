<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['model', 'registration_no', 'img_url', 'status', 'details', 'rental_rate', 'brand', 'properties'];

    protected $casts = [
        'properties' => 'array'
    ];
}
