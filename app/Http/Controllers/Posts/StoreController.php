<?php

namespace App\Http\Controllers\Posts;

use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        //Валидирует данные
        $data = $request->validate( $request->rules(), $request->messages());

        //Передаем в сервис
        $post = $this->service->store($data);

        //Передаем в ресурсы что бы возвращать json на фронт
        return new PostResource($post);


        //return redirect()->route('post.index');
    }

}
