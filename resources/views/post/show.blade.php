@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-header">Post Show</div>

        <div class="card-body">
            <div class="form-group mb-2">
                <label>Post Title : {{ $postDetail->title }}</label>
            </div>
            <div class=" form-group mb-2">
                <label>Post Body</label>
                <p>Post Body: {{ $postDetail->body }}</p>
            </div>
        </div>
    </div>
</div>
@endsection