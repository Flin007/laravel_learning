<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {
        //Находим все посты для передачи во view
        $posts= Post::all();

        return view('post.index', compact('posts'));
    }

}
