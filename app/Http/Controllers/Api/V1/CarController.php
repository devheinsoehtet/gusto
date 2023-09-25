<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Car::class, 'car');
    }

    public function index()
    {
        return CarResource::collection(Car::orderBy('id', 'desc')->paginate(10))
            ->additional([
                'message' => 'success'
            ]);
    }

    public function show(Car $car)
    {
        return (new CarResource($car))->additional(['message' => 'success']);
    }

    
}
