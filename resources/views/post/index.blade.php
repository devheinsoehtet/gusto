@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            @foreach ($posts as $key => $value)
            <div class="card">
                <label> Titile : {{ $value->title }}</label>
                <p>{{ $value->body }}</p>
                <form action="{{ route('post.show', $value->id) }}" method="GET">
                    <button type="submit" class="btn btn-warning">Details>></button>
                </form>
                <form action="{{ route('post.destroy', $value->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-warning">Delete>></button>
                </form>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-end">
            <form method="GET" action="{{ route('post.create') }}" enctype="multipart/form-data">
                <button type="submit" class="btn btn-warning btn-block">
                    <span class="material-icons">
                        add
                    </span>
                    Add New Post
                </button>
            </form>
        </div>
    </div>
</div>
@endsection