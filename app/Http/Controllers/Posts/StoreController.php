<?php

namespace App\Http\Controllers\Posts;

use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        //Валидирует данные
        $data = $request->validate( $request->rules(), $request->messages());

        //Передаем в сервис
        $post = $this->service->store($data);

        //Проверяем наследуется ли пост от модели поста, если нет возвращаем просто пост, в котором лежит ошибка,
        //пойманная в try catch Service.php
        return $post instanceof Post ? new PostResource($post) : $post;

        //return redirect()->route('post.index');
    }

}
