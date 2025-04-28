@extends('post.master')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                @if (session())
                    <h1>{{session('success')}}</h1>
                @endif
                <form action="{{ route('post.update', ['id' => $post]) }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="" cols="20" rows="5">{{ $post->description }}</textarea>
                    </div>
                    <img src="{{ asset($post->image) }}" alt="img" height="70px" width="70px" style="border-radius: 50%">
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
