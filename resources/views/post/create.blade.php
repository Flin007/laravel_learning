@extends('layouts.main')
@section('content')
    <h1>Добавление нового поста</h1>
    <form method="post" action="{{ route('post.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input value="{{ old('title') }}" name="title" type="text" class="form-control" id="title" placeholder="Заголовок">
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Контент</label>
            <textarea name="content" type="text" class="form-control" id="content" placeholder="Контент поста...">{{ old('content') }}</textarea>
            @error('content')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input value="{{ old('image') }}" name="image" type="text" class="form-control" id="image" placeholder="img.src">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Выборт категории</label>
            <select id="category" class="form-select mb-3" aria-label="Default select example" name="category_id">
                @foreach($categories as $category)
                    {{ old('category_id') }}
                    {{ $category->id }}
                    <option
                        {{ old('category_id') == $category->id ? 'selected': '' }}
                        value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Выборт тегов</label>
            <select id="tags" class="form-select" multiple aria-label="multiple select example" name="tags[]">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
            @error('tags')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
