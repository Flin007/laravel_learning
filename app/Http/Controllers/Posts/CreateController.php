<?php

namespace App\Http\Controllers\Posts;

use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        //Находим все категории для передачи во view
        $categories = Category::all();

        //Находим все теги для передачи во view
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

}
