@extends('layouts.main')
@section('content')
    <h1>This is posts page</h1>
    @foreach($posts as $post)
        <div>{{ $post->title }}</div>
        <div>{{ $post->content }}</div>
        <div>{{ $post->likes }}</div>
    @endforeach
@endsection
