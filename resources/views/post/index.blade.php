@extends('post.master')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                @if (session())
                    <h1>{{session('success')}}</h1>
                @endif
                <form action="{{ route('post.insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        &nbsp;&nbsp;&nbsp;
                        <span style="color: red">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </span>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        &nbsp;&nbsp;&nbsp;
                        <span style="color: red">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </span>
                        <textarea name="description" class="form-control" id="" cols="20" rows="5">{{ old('description') }}</textarea>
                    </div>
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
