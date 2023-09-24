@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <thead class="table-warning">
                    <th>No.</th>
                    <th>Vehicle Image</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Customer</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Amount</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @if($bookings->count())
                    @foreach($bookings as $booking)
                        <tr>
                            <td> {{ $booking->id }} </td>
                            <td>  <img src="{{ asset($booking->car->img_url) }}" class="card-img zoom" style="width: 5rem;"></td>
                            <td> {{ $booking->car->brand }} </td>
                            <td> {{ $booking->car->model }} </td>
                            <td> {{ $booking->user->name }} </td>
                            <td> {{ $booking->start_date }} </td>
                            <td> {{ $booking->end_date }} </td>
                            <td> {{ $booking->amount }} MMK</td>
                            <td> 
                                <form action="{{ route('bookings.show', $booking->id) }}" method="GET">
                                    <button type="submit" class="btn btn-warning">Details>></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2"> No record found </td>
                    </tr>
                @endif
                
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $bookings->links() }}
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