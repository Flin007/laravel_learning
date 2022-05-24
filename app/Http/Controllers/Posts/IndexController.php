<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {
        //Находим все посты для передачи во view
        $posts= Post::paginate(4);

        return view('post.index', compact('posts'));
    }

}
