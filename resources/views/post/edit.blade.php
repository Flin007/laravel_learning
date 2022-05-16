@extends('layouts.main')
@section('content')
    <h1>Изменение поста</h1>
    <form method="post" action="{{ route('post.update', $post->id) }}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input name="title" type="text" class="form-control" id="title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Контент</label>
            <textarea name="content" type="text" class="form-control" id="content">{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input name="image" type="text" class="form-control" id="image" placeholder="img.src" value="{{ $post->image }}">
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endsection
