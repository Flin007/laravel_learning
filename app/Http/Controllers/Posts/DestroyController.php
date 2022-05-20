<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;

class DestroyController extends BaseController
{
    public function __invoke(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

}
