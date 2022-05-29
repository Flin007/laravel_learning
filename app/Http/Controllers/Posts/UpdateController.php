<?php

namespace App\Http\Controllers\Posts;

use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {

        //Валидируем данные
        $data = $request->validated();

        //Передаем в сервис
        $post = $this->service->update($post, $data);

        //Проверяем наследуется ли пост от модели поста, если нет возвращаем просто пост, в котором лежит ошибка,
        //пойманная в try catch Service.php
        return $post instanceof Post ? new PostResource($post) : $post;

        //Раньше редиректили на вью
        //return redirect()->route('post.show',$post->id);
    }

}
