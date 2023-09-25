<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\CarStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Http\Resources\BookingResource;
use App\Mail\CarBooked;
use App\Models\Booking;
use App\Models\Car;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Booking::class, 'booking');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookingResource::collection(
            Booking::relatedBooking()
                ->with('car')->orderBy('id', 'desc')->paginate(10)
        )
            ->additional([
                'message' => 'success'
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {
        $validatedBookingData = $request->validated();

        $car = Car::where('id', $validatedBookingData['car_id'])->where('status', CarStatus::AVAILABLE)->first();

        abort_unless($car, 403, 'car is not available');

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

        return response()->json([
            'message' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return (new BookingResource($booking))->additional(['message' => 'success']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $validatedBookingData = $request->validated();

        $car = $booking->car;

        $startDate = Carbon::parse($validatedBookingData['start_date']);
        $endDate = Carbon::parse($validatedBookingData['end_date']);
        $duration = $endDate->diff($startDate)->days + 1;

        $booking->update([
            'user_id' => $booking->user_id,
            'car_id' => $validatedBookingData['car_id'],
            'start_date' => $validatedBookingData['start_date'],
            'end_date' => $validatedBookingData['end_date'],
            'amount' =>  $duration * $car->rental_rate
        ]);
        // Mail::to(auth()->user())->send(new CarBooked($car, $booking));

        return response()->json([
            'message' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        $booking->car->status = CarStatus::AVAILABLE;
        $booking->car->save();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
