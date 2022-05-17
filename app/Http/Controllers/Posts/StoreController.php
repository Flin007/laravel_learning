<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data = request()->all();

        Validator::make($data, [
            'title' => 'required|min:3|max:10',
            'content' => 'required|min:10|max:255',
            'image' => '',
            'category_id' => '' ,
            'tags' => 'required|array',
        ],
            [
                'title.required' => 'Заголовок - обязательно поле',
                'title.min' => 'Длина заголовока должна быть не меньше 3 символов',
                'title.max' => 'Длина заголовока должна быть не больше 10 символов',
                'content.required' => 'Контент - обязательное поле',
                'content.min' => 'Длина контента должна быть не меньше 10 символов',
                'content.max' => 'Длина контента должна быть не больше 255 символов',
            ])->validate();

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
