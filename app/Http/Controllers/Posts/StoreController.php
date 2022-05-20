<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validate( $request, $rules, $request->messages());

        $tags = $data['tags'];
        unset($data['tags']);

        //Записываем в переменную что бы получить id создавшегося поста
        $post = Post::create($data);

        //более профессиональный метод через attach
        $post->tags()->attach($tags);


        //Простой наглядный способ, есть более профессиональный
        /*foreach ($tags as $tag) {
            //Используем firstOrCreate что бы не дублировть связи
            PostTag::firstOrCreate([
                'tag_id' => $tag,
                'post_id' => $post->id
            ]);
        }*/

        return redirect()->route('post.index');
    }

}
