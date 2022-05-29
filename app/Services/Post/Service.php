<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data)
    {
        try {
            //Начинаем транзакцию, она позволяет откатить все, если была ошибка
            DB::beginTransaction();

            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);

            //Передаем то что пришло в data['category'], эт может быть айди или просто тайтл если нужно создать новую категорию
            //И возвращаем это все в нашу дату для создания нового поста
            $data['category_id'] = $this->getCategotyId($category);

            //Получаем id всех тегов и тех что пришли и тех что нужно было создать (пришли без id)
            $tagIds = $this->getTagIds($tags);

            //Записываем в переменную ч то бы получить id создавшегося поста
            $post = Post::create($data);

            //более профессиональный метод через attach
            $post->tags()->attach($tagIds);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

        return $post;

    }

    public function update($post, $data)
    {
        try {
            //Начинаем транзакцию, она позволяет откатить все, если была ошибка
            DB::beginTransaction();

            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);

            //Передаем то что пришло в data['category'], эт может быть айди или просто тайтл если нужно создать новую категорию
            //И возвращаем это все в нашу дату для создания нового поста
            $data['category_id'] = $this->getCategotyId($category);

            //Получаем id всех тегов и тех что пришли и тех что нужно было создать (пришли без id)
            $tagIds = $this->getTagIdsWithUpdate($tags);

            //Обновляем данные поста
            $post->update($data);

            //Назначаем тэги для поста
            //Метод sync удаляем старые связки и добавляет новые
            $post->tags()->sync($tagIds);

            DB::commit();
        } catch (\Exception $exception){
            DB::rollBack();
            return $exception->getMessage();
        }

        return $post->fresh();
    }

    //
    private function getTagIds($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }

    //
    private function getTagIdsWithUpdate($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            if (!isset($tag['id'])) {
                $tag = Tag::create($tag);
            } else {
                $currentTag = Tag::find($tag['id']);
                $currentTag->update($tag);
                $tag = $currentTag->fresh();
            }
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }

    //
    private function getCategotyId($item)
    {
        $category = !isset($item['id']) ? Category::create($item) : Category::find($item['id']);
        return $category->id;
    }

    //
    private function getCategotyIdWithUpdate($item)
    {
        if(!isset($item['id'])){
            $category = Category::create($item);
        }else{
            $category = Category::find($item['id']);
            $category->update($item);
            $category = $category->fresh();
        }
        return $category->id;
    }

}
