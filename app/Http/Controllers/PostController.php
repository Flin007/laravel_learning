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
        foreach ($postsArr as $item) {
            Post::create($item);
        }

    }


    static function update()
    {
        $post = Post::find(6);
        $post->update([
            'title' => 'updated',
            'content' => 'updated',
            'image' => 'updated',
            'likes' => 1000,
            'is_published' => 0,
        ]);
    }

    static function delete()
    {
        $post = Post::find(6);
        $post->delete();
    }

    static function first_or_create()
    {
        //Если не находит пост с заголовком another post, то создает новый, если находит - возвращает первый найденный
        $post = Post::firstOrCreate([
            'title' => 'another postt',
        ],
            [
                'title' => 'another post2',
                'content' => 'another post content',
                'image' => 'another post.jpg',
                'likes' => '5000',
                'is_published' => '1',
            ]
        );
        dump($post->content);
        dd('finished');
    }

    static function update_or_create()
    {
        //Обновляет найденную запист, если не найдет - создает новую
        $post = Post::updateOrCreate([
            'title' => 'another post',
        ],
            [
                'title' => 'another post2',
                'content' => 'another post content',
                'image' => 'another post.jpg',
                'likes' => 777,
                'is_published' => 1,
            ]
        );
        dump($post->content);
        dd('finished');
    }
}
