<?php

namespace App\Http\Controllers\Posts;

use App\Http\Requests\Post\FilterRequest;

class StoreController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        //Валидирует данные
        $data = $request->validate( $request->rules(), $request->messages());

        //Передаем в сервис
        $this->service->store($data);


        return redirect()->route('post.index');
    }

}
