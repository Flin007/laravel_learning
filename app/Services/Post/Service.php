<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store($data)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        //Записываем в переменную что бы получить id создавшегося поста
        $post = Post::create($data);

        //более профессиональный метод через attach
        $post->tags()->attach($tags);

        return $post;

    }

    public function update($post, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        //Обновляем данные поста
        $post->update($data);

        //Назначаем тэги для поста
        //Метод sync удаляем старые связки и добавляет новые
        $post->tags()->sync($tags);

        return $post->fresh();
    }
}
