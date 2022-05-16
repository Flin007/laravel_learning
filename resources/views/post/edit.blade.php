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
            <input name="image" type="text" class="form-control" id="image" placeholder="img.src"
                   value="{{ $post->image }}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Выборт категории</label>
            <select id="category" class="form-select mb-3" aria-label="Default select example" name="category_id">
                @foreach($categories as $category)
                    <option {{  $post->category->id === $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endsection
