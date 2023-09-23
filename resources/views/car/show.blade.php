@extends('layouts.app')

@section('content')

<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Car Details</h2>
                </div>
                <div class="pull-right">
                    
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
            <div class="row">
                <div class="card border-2 border border-warning-subtle rounded shadow-lg col-xs-6 col-sm-6 col-md-6">
                    @if($car->img_url)
                        <img src="{{ asset($car->img_url) }}" class="p-3" style="width: 40rem; height: 30rem;">
                    @else 
                        <span>No image found!</span>
                    @endif
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
                        <strong>Properties:</strong>
                        @foreach ($car->properties as $propertie)
                            <input type="text" name="name" value="{{ $propertie }}" class="form-control"
                            placeholder="Propertie" readonly>
                        @endforeach
                    </div>
                </div>
            </div>
       
    </div>

@endsection