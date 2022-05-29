<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Разрешаем изменение, добавление данных в базу
    //Можно разрешаеть конкретным атрибутам(стобцам) protected $fillable ["title", "content"];
    protected $guarded = []; //Можно указать false

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
