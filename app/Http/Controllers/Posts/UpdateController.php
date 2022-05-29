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


        //Раньше редиректили на вью
        //return redirect()->route('post.show',$post->id);

        //Теперь возвращаем постресурс
        return new PostResource($post);
    }

}
