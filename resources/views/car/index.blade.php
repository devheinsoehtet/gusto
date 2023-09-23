@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Car Booking</h1>
    <div class="row">
    @foreach ($cars as $car)
        <div class="card col-3 m-3 border border-warning-subtle rounded" style="width: 17rem;">
            <div class="m-1">
                <div class="card-header bg-light-subtle border-warning-subtle">
                    <span class="card-title">{{$car->model}}</span>
                </div>
                <div class="card-body">
                    <img src="{{$car->img_url}}" style="width: 13rem; height: 8rem;" class="card-img-top" alt="...">
                    
                    <span class="card-title">{{$car->rental_rate}}MMK</span>
                    
                </div>
                <div class="card-footer bg-light-subtle border-warning-subtle">
                    <form action="{{ route('cars.show',$car->id) }}" method="GET">
                        <button type="submit" class="btn btn-warning">Details>></button>
                    </form>
                </div>
            </div>
        </div>
        
    @endforeach
    
    </div>
        <div class="row">
        <div class="col-3"></div>
        <div class="col-3"></div>
        <div class="col-3"></div>
        <div class="col-3">
        {{$cars->links()}}
        </div>
</div>
</div>



@endsection