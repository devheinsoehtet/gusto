<?php

namespace App\Http\Controllers;

use App\Enums\CarStatus;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Mail\CarBooked;
use App\Models\Booking;
use App\Models\Car;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('booking.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {
        $validatedBookingData = $request->validated();

        $car = Car::where('id', $validatedBookingData['car_id'])->first();

        $startDate = Carbon::parse($validatedBookingData['start_date']);
        $endDate = Carbon::parse($validatedBookingData['end_date']);
        $duration = $endDate->diff($startDate)->days + 1;

        $booking = Booking::create([
            'user_id' => auth()->user()->id,
            'car_id' => $validatedBookingData['car_id'],
            'start_date' => $validatedBookingData['start_date'],
            'end_date' => $validatedBookingData['end_date'],
            'amount' =>  $duration * $car->rental_rate
        ]);

        $car->status = CarStatus::TAKEN;
        $car->save();

        // Mail::to(auth()->user())->send(new CarBooked($car, $booking));

        $request->session()->forget('old');
        return redirect()->route('bookings.index')->withInput(['actionStatus' => 'success', 'actionMessage' => 'Successfully Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingRequest  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
