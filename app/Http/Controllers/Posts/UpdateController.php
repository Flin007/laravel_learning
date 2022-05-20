<?php

namespace App\Http\Controllers\Posts;

use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {

        //Валидируем данные
        $data = $request->validated();


        //Передаем в сервис
        $this->service->update($post, $data);

        return redirect()->route('post.show',$post->id);
    }

}
