<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    //Разрешаем изменение, добавление данных в базу
    //Можно разрешаеть конкретным атрибутам(стобцам) protected $fillable ["title", "content"];
    protected $guarded = []; //Можно указать false

    //Получаем все посты по тегу при помощи взаимодействия многие ко многим
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id');
    }
}
