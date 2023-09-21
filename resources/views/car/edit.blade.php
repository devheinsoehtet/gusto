@extends('layouts.app')

@section('content')
<form action="{{route('cars.update')}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
@include('car.shared.form')
<button type="submit" class="btn btn-primary btn-block">Update</button>
</form>
@endsection