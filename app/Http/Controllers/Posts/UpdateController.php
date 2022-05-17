<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        //Обновляем данные поста
        $post->update($data);

        //Назначаем тэги для поста
        //Метод sync удаляем старые связки и добавляет новые
        $post->tags()->sync($tags);

        return redirect()->route('post.show',$post->id);
    }

}
