@extends('layouts.main')
@section('content')
    <h1>This is posts create page</h1>
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
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
