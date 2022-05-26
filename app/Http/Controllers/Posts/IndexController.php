<?php

namespace App\Http\Controllers\Posts;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        //Так можно работать с полицией и запрещать те или иные действия
        //$this->authorize('view', auth()->user());

        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(4);

        return view('post.index', compact('posts'));
    }

}

