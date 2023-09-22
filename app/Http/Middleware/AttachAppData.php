<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Enums\CarStatus;
use App\Enums\DoorCount;
use App\Enums\FuelType;
use App\Enums\GearboxType;
use App\Enums\SeatCount;

class AttachAppData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        session([
            'car_status' => CarStatus::getKeys(),
            'door_count' => DoorCount::getValues(),
            'fuel_type' => FuelType::getValues(),
            'gear_box_type' => GearboxType::getValues(),
            'seat_count' => SeatCount::getValues()
        ]);
        
        return $next($request);
    }
}
