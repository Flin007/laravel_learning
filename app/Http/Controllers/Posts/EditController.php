<?php

namespace App\Http\Controllers\Posts;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class EditController extends BaseController
{
    public function __invoke(Post $post)
    {
        //Находим все категории для передачи во view
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

}
