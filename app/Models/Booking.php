<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['car_id', 'user_id', 'start_date', 'end_date', 'amount', 'active'];

    protected $appends = ['duration'];

    protected $with = ['user', 'car'];

    protected function duration(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Carbon::parse($attributes['end_date'])->diff(Carbon::parse($attributes['start_date']))->days + 1,
        );
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function car()
    {
        return $this->hasOne(Car::class, 'id', 'car_id');
    }


    public function scopeRelatedBooking($query)
    {
        if(!auth()->user()->isAdmin()) {
            return $query->where('user_id', auth()->user()->id);
        }
    }
}
