@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row gx-5 d-flex justify-content-center">
            <div class=" card border-2 border border-warning-subtle rounded shadow-lg col-xs-6 col-sm-6 col-md-6">
                <div class="my-4 d-flex justify-content-center">
                        @if ($booking->car->img_url)
                            <img src="{{ asset($booking->car->img_url) }}" style="width: 15rem;" class="card-img">
                        @else
                            <span>No image found!</span>
                        @endif
                </div> 
                
                <div class="form-group m-1">
                        <strong>Customer:</strong>
                        <input type="text" name="name" value="{{ $booking->user->name }}" class="form-control"
                            placeholder="Customer" readonly>
                </div>   

                <div class="form-group m-1">
                        <strong>Brand:</strong>
                        <input type="text" name="name" value="{{ $booking->car->brand }}" class="form-control"
                            placeholder="Brand" readonly>
                </div>

                <div class="form-group m-1">
                        <strong>Model:</strong>
                        <input type="text" name="name" value="{{ $booking->car->model }}" class="form-control"
                            placeholder="Model" readonly>
                </div>

                <div class="form-group m-1">
                        <strong>Days:</strong>
                        <input type="text" name="name" value="{{ $booking->duration }}" class="form-control"
                            placeholder="Days" readonly>
                </div>

                <div class="form-group m-1">
                        <strong>Start Date:</strong>
                        <input type="text" name="name" value="{{ $booking->start_date }}" class="form-control"
                            placeholder="Start Date" readonly>
                </div>

                <div class="form-group m-1">
                        <strong>End Date:</strong>
                        <input type="text" name="name" value="{{ $booking->end_date }}" class="form-control"
                            placeholder="End Date" readonly>
                </div>

                <div class="form-group my-3">
                        <strong>Amount:</strong>
                        <input type="text" name="name" value="{{ $booking->amount }} MMK" class="form-control"
                            placeholder="Amount" readonly>
                </div>

               
            </div>
        </div>
    </div>
@endsection

<style>
.zoom {
  transition: transform .2s; /* Animation */
  margin: 0 auto;
}
.zoom:hover {
  transform: scale(2.0);
}
</style>
