<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    //Метод получения постов
    static function index()
    {
        //Находим первый пост с id = 1 в таблице, к которой привязана модель Зщые (posts)
        $posts = Post::find(1);
        $category = Category::find(1);

        dd($posts->category->title);

        //return view('post.index', compact('posts'));
    }

    //Метод для создания новых записей
    static function create()
    {
        return view('post.create');
    }

    //store
    static function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    //show
    static function show(Post $post)
    {
       return view('post.show', compact('post'));
    }

    //edit
    static function edit(Post $post){
        return view('post.edit', compact('post'));
    }

    //update
    static function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);
        $post->update($data);
        return redirect()->route('post.show',$post->id);
    }

    //destroy
    static function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

}
