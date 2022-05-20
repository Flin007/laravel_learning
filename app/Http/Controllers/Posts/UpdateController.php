<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {

        $data = request()->validate();

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
