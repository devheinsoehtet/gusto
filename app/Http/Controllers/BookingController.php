<?php

namespace App\Http\Controllers;

use App\Enums\CarStatus;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\Car;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::orderBy('id','asc')->with('user', 'car')->paginate(10);
        return view('booking.index', compact('bookings'));
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

        Booking::create([
            'user_id' => auth()->user()->id,
            'car_id' => $validatedBookingData['car_id'],
            'start_date' => $validatedBookingData['start_date'],
            'end_date' => $validatedBookingData['end_date'],
            'amount' =>  $duration * $car->rental_rate
        ]);

        $car->status = CarStatus::TAKEN;
        $car->save();

        $request->session()->forget('old');
        return redirect()->route('bookings.index')->withInput(['actionStatus' => 'success', 'actionMessage' => 'Successfully Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::with('car', 'user')->find($id);
        $startDate = Carbon::parse($booking->start_date);
        $endDate = Carbon::parse($booking->end_date);
        $booking->diffInDays = $startDate->diffInDays($endDate);
        return view('booking.show', compact('booking'));
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
