<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        //Находим первый пост с id = 1 в таблице, к которой привязана модель Зщые (posts)
        $posts = Post::where('is_published', 0)->get();
        foreach ($posts as $post) {
            echo $post->title.'</br>';
        }
    }
}
