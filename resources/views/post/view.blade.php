@extends('post.master')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                @if (session())
                    <h1>{{ session('success') }}</h1>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>
                                    <img src="{{ asset($post->image) }}" alt="img" height="50px" width="50px" style="border-radius: 50%">
                                </td>
                                <td>
                                    <a href="{{ route('post.edit', ['id' => $post]) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('post.delete', ['id' => $post]) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
