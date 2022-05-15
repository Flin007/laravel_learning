@extends('layouts.main')
@section('content')
    <a href="{{ route('post.index') }}">Назад</a>
    <a href="{{ route('post.edit', $post) }}">Изменить</a>
    <form action="{{ route('post.delete', $post) }}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-danger" type="submit">Удалить</button>
    </form>
    <h1>{{ $post->title }}</h1>
    <img style="margin: 0 auto; width: 300px;" src="{{ $post->image }}" alt="">
    <p>{{ $post->content }}</p>
@endsection
