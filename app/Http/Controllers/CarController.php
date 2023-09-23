<?php

namespace App\Http\Controllers;

use App\Enums\CarStatus;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::orderBy('id','desc')->paginate(8);
        return view('car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {
        $validatedCarData = $request->validated();

        $path = Storage::disk('public')->putFileAs(
            'cars',
            $validatedCarData['image'],
            Carbon::now()->timestamp . "." . $validatedCarData['image']->getClientOriginalExtension()
        );

        Car::create([
            'brand' => $validatedCarData['brand'],
            'model' => $validatedCarData['model'],
            'registration_no' => $validatedCarData['registration_no'],
            'img_url' => 'storage/' . $path,
            'status' => CarStatus::getValue($validatedCarData['status']),
            'details' => $validatedCarData['details'],
            'rental_rate' => $validatedCarData['rental_rate'],
            'properties' => [
                'door_count' => $validatedCarData['door_count'],
                'fuel_type' => $validatedCarData['fuel_type'],
                'seat_count' => $validatedCarData['seat_count'],
                'gear_box_type' => $validatedCarData['gear_box_type'],
            ]
        ]);

        $request->session()->forget('old');
        return redirect()->route('cars.index')->withInput(['actionStatus' => 'success', 'actionMessage' => 'Successfully Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        $car->status = CarStatus::getKey($car->status);
        return view('car.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('car.edit', ['car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarRequest  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
