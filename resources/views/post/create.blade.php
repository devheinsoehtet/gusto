@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-header">Post Create</div>

        <div class="card-body">
            <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label>Post Title</label>
                    <input type="text" name="post-title" class="form-control">
                </div>
                <div class=" form-group mb-2">
                    <label>Post Body</label>
                    <input type="text" name="post-body" class="form-control">
                </div>

                <button type=" submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection