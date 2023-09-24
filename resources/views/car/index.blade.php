@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-end">
                <form method="GET" action="{{ route('cars.create') }}" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-warning btn-block">Add New Car +</button>
                </form>
            </div>
            @foreach ($cars as $car)
                <div class="card col-3 m-3 border border-warning-subtle rounded" style="width: 17rem;">
                    <div class="m-1">
                        <div class="card-header bg-light-subtle border-warning-subtle">
                            <h6 class="card-title fw-bold">{{ $car->brand .' - '. $car->model }}</h6>
                        </div>
                        <div class="card-body">
                            <img src="{{ $car->img_url }}" class="card-img card-img-top mb-2">
                            <span class="fw-bold">{{ $car->rental_rate }} MMK</span>

                        </div>
                        <div class="card-footer bg-light-subtle border-warning-subtle">
                            <form action="{{ route('cars.show', $car->id) }}" method="GET">
                                <button type="submit" class="btn btn-warning">Details>></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="d-flex justify-content-center">
            {{ $cars->links() }}
        </div>
    </div>
    </div>
@endsection
