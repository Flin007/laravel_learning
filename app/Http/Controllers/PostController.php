<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
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

        //Находим все теги для передачи во view
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

    //store
    static function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        //Записываем в переменную что бы получить id создавшегося поста
        $post = Post::create($data);

        //более профессиональный метод через attach
        $post->tags()->attach($tags);


        //Простой наглядный способ, есть более профессиональный
        /*foreach ($tags as $tag) {
            //Используем firstOrCreate что бы не дублировть связи
            PostTag::firstOrCreate([
                'tag_id' => $tag,
                'post_id' => $post->id
            ]);
        }*/

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
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    //update
    static function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        //Обновляем данные поста
        $post->update($data);

        //Назначаем тэги для поста
        //Метод sync удаляем старые связки и добавляет новые
        $post->tags()->sync($tags);

        return redirect()->route('post.show',$post->id);
    }

    //destroy
    static function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

}
