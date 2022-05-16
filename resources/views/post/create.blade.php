@extends('layouts.main')
@section('content')
    <h1>Добавление нового поста</h1>
    <form method="post" action="{{ route('post.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Заголовок">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Контент</label>
            <textarea name="content" type="text" class="form-control" id="content" placeholder="Заголовок">

            </textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input name="image" type="text" class="form-control" id="image" placeholder="img.src">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Выборт категории</label>
            <select id="category" class="form-select mb-3" aria-label="Default select example" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
