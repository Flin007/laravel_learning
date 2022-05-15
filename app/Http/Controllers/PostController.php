<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    //Метод получения постов
    static function get()
    {
        //Находим первый пост с id = 1 в таблице, к которой привязана модель Зщые (posts)
        $posts = Post::where('is_published', 0)->get();
        foreach ($posts as $post) {
            echo $post->title . '</br>';
        }
    }

    //Метод для создания новых записей
    static function create()
    {
        //Пример
        $postsArr = [
            [
                'title' => 'title of new post',
                'content' => 'some content',
                'image' => 'imageblabla.jpg',
                'likes' => '20',
                'is_published' => '1',
            ],
            [
                'title' => 'title of one more post',
                'content' => 'some content for second post',
                'image' => 'imageblabla2.jpg',
                'likes' => '50',
                'is_published' => '1',
            ]
        ];

        //Пробегаемся по массиву и добавляем в базу
        foreach ($postsArr as $item){
            Post::create($item);
        }

    }


    static function update(){
        $post = Post::find(6);
        $post->update([
            'title' => 'updated',
            'content' => 'updated',
            'image' => 'updated',
            'likes' => 1000,
            'is_published' => 0,
        ]);
    }
}
