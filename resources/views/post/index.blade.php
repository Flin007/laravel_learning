@extends('layouts.main')
@section('content')
    <h1>Список постов</h1>
    <a class="btn btn-success m-3" href="{{ route('post.create') }}">Добавить пост</a>
    <div class="posts row px-3">
        @foreach($posts as $post)
            <a href="{{ route('post.show', $post->id) }}" class="card col-md-3 gx-3" style="text-decoration: unset; color: unsetgit">
                <img src="{{ $post->image }}" class="card-img-top" alt="...">
                <div class="card-body" style="text-decoration: none">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <p class="card-text">Категория - {{ $post->category->title }}</p>
                    <span>Лайков - </span><span href="#" class="btn btn-primary">{{ $post->likes ? : 0 }}</span>
                </div>
            </a>
        @endforeach

        <div class="mt-3 d-flex justify-content-center">
            {{ $posts->withQueryString()->links() }}
        </div>
    </div>
@endsection
