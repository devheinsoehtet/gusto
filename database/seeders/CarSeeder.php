<?php

namespace Database\Seeders;

use App\Enums\CarStatus;
use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::create([
            'model' => 'Toyota',
            'number' => 'YGN-012323',
            'img_url' => 'car.jpg',
            'status' => CarStatus::AVAILABLE,
            'details' => "car's details",
            'rental_rate' => 100000
        ]);
    }
}
