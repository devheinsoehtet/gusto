@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row gx-5">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="card border-2 border border-warning-subtle rounded shadow-lg ">
                    @if ($car->img_url)
                        <img src="{{ asset($car->img_url) }}" class="card-img">
                    @else
                        <span>No image found!</span>
                    @endif
                </div>
                <div class="mt-3">

                    @can('admin')
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning" role="button">Edit</a>
                    @endcan
                    @if ($car->status == 'AVAILABLE')
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#bookingModal">
                        Book Now
                    </button>
                    @endif
                </div>
            </div>

            <div class="card border-2 border border-warning-subtle rounded shadow-lg col-xs-6 col-sm-6 col-md-6">
                <div class="form-group m-1">
                    <strong>Status:</strong>
                    <input type="text" name="name" value="{{ $car->status }}" class="form-control"
                        placeholder="Status" readonly>
                </div>
                <div class="form-group m-1">
                    <strong>Model:</strong>
                    <input type="text" name="name" value="{{ $car->model }}" class="form-control"
                        placeholder="Model" readonly>
                </div>
                <div class="form-group m-1">
                    <strong>Brand:</strong>
                    <input type="text" name="name" value="{{ $car->brand }}" class="form-control"
                        placeholder="Brand" readonly>
                </div>
                <div class="form-group m-1">
                    <strong>Registration No:</strong>
                    <input type="text" name="name" value="{{ $car->registration_no }}" class="form-control"
                        placeholder="Registration No" readonly>
                </div>
                <div class="form-group m-1">
                    <strong>Rental Rate:</strong>
                    <input type="text" name="name" value="{{ $car->rental_rate }} MMK" class="form-control"
                        placeholder="Rental Rate" readonly>
                </div>
                <div class="form-group  m-1">
                    <strong>Details:</strong>
                    <textarea class="form-control" placeholder="Details" rows="4" readonly>{{ $car->details }}</textarea>
                </div>

                <div class="form-group m-1">
                    @foreach ($car->properties as $key => $property)
                        <strong>{{ Str::ucfirst(str_replace('_', ' ', $key)) }}</strong>
                        <input type="text" name="name" value="{{ $property }}" class="form-control mb-2"
                            placeholder="Property" readonly>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="bookingModal">
        <form class="modal-dialog" method="POST" action="{{ route('bookings.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Booking</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="{{$car->id}}" name="car_id">
                    <div class="form-group mb-2">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror">
                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror">
                        @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
