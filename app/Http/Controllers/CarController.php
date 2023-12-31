<?php

namespace App\Http\Controllers;

use App\Enums\CarStatus;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Car::class, 'car');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cars = Car::orderBy('id', 'desc')->paginate(8);

        $actionStatus = session('actionStatus');
        $actionMessage = session('actionMessage');

        session()->forget(['actionStatus', 'actionMessage']);

        return view('car.index', [
            'cars' => $cars,
            'actionStatus' => $actionStatus,
            'actionMessage' => $actionMessage
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('policy method name', Car::class);
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

        return redirect()->route('cars.index')
            ->with('actionStatus', 'success')
            ->with('actionMessage', 'Successfully Added');
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
        return view('car.show', ['car' => $car]);
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
        $validatedCarData = $request->validated();

        $carUpdateData = [
            'brand' => $validatedCarData['brand'],
            'model' => $validatedCarData['model'],
            'registration_no' => $validatedCarData['registration_no'],
            'status' => CarStatus::getValue($validatedCarData['status']),
            'details' => $validatedCarData['details'],
            'rental_rate' => $validatedCarData['rental_rate'],
            'properties' => [
                'door_count' => $validatedCarData['door_count'],
                'fuel_type' => $validatedCarData['fuel_type'],
                'seat_count' => $validatedCarData['seat_count'],
                'gear_box_type' => $validatedCarData['gear_box_type'],
            ]
        ];

        if(array_key_exists('image', $validatedCarData)) {
            $path = Storage::disk('public')->putFileAs(
                'cars',
                $validatedCarData['image'],
                Carbon::now()->timestamp . "." . $validatedCarData['image']->getClientOriginalExtension()
            );
            $carUpdateData['img_url'] = 'storage/' . $path;
        }

        $car->update([
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

        return redirect()->route('cars.index')
            ->with('actionStatus', 'success')
            ->with('actionMessage', 'Successfully Updated');
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
