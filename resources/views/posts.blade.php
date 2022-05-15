@extends('layouts.main')
@section('content')
    <h1>This is posts page</h1>
    <div class="posts row px-3">
        @foreach($posts as $post)
            <a href="/posts/{{ $post->id }}" class="card col-md-3 gx-3" style="text-decoration: unset; color: unsetgit">
                <img src="{{ $post->image }}" class="card-img-top" alt="...">
                <div class="card-body" style="text-decoration: none">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <span href="#" class="btn btn-primary">{{ $post->likes }}</span>
                </div>
            </a>
        @endforeach
    </div>
@endsection
