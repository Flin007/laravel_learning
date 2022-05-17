<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        //Находим все посты для передачи во view
        $posts= Post::all();

        return view('post.index', compact('posts'));
    }

}
