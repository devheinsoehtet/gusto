<?php

namespace Database\Factories;

use App\Enums\CarStatus;
use App\Models\Car;
use Faker\Factory as FakerFactory;
use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Xvladqt\Faker\LoremFlickrProvider;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{

    private $brands = ['Toyota', 'Ford', 'BMW', 'Audi', 'Lexus'];
    private $rentalRates = [100000, 200000, 300000, 400000, 500000];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $faker = (new FakerFactory())::create();
        $faker->addProvider(new Fakecar($faker));
        $faker->addProvider(new LoremFlickrProvider($faker));

        $brand = Arr::random($this->brands);

        $imageUrl = $faker->imageUrl(640, 480, [$brand . '_car']);

        $imageContent = file_get_contents($imageUrl);

        $filename = 'cars/generated_image_' . uniqid() . '.jpg';

        Storage::disk('public')->put($filename, $imageContent);

        sleep(1);

        return [
            'brand' => $brand,
            'model' => $faker->vehicleModel,
            'registration_no' => $faker->regexify('[A-Z][1-9]-\d{4}'),
            'img_url' => 'storage/'. $filename,
            'status' => Arr::random(CarStatus::getValues()),
            'details' => $faker->paragraph(),
            'rental_rate' => Arr::random($this->rentalRates),
            'properties' => [
                'door_count' => $faker->vehicleDoorCount,
                'fuel_type' => $faker->vehicleFuelType,
                'seat_count' => $faker->vehicleSeatCount,
                'gear_box_type' => $faker->vehicleGearBoxType,
            ]
        ];
    }
}
