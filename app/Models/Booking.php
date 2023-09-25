<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['car_id', 'user_id', 'start_date', 'end_date', 'amount', 'active'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function car()
    {
        return $this->hasOne(Car::class, 'id', 'car_id');
    }
}
