@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Car Information</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('car.shared.form')
                            <button type="submit" class="btn btn-primary btn-block">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
