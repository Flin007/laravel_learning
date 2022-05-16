<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    //Метод получения постов
    static function index()
    {
        //Находим все посты для передачи во view
        $posts= Post::all();

        return view('post.index', compact('posts'));
    }

    //Метод для создания новых записей
    static function create()
    {
        //Находим все категории для передачи во view
        $categories = Category::all();

        return view('post.create', compact('categories'));
    }

    //store
    static function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => ''
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
        //Находим все категории для передачи во view
        $categories = Category::all();

        return view('post.edit', compact('post', 'categories'));
    }

    //update
    static function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => ''
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
