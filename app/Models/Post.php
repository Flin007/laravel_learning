<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Post
 *
 * @mixin Eloquent
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string|null $image
 * @property int|null $likes
 * @property int $is_published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 */
class Post extends Model
{
    //Трейт для использования фабрики генерации контента Post::factory(20)->create();
    use HasFactory;
    //Встраиваем трейт для фильтров
    use Filterable;

    //Разрешаем изменение, добавление данных в базу
    //Можно разрешаеть конкретным атрибутам(стобцам) protected $fillable ["title", "content"];
    protected $guarded = []; //Можно указать false

    //Явно указываем таблицу, с которой работает модель
    protected $table = 'posts';

    //Получаем категорию поста при помощи взаимодействия один ко многим
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    //Получаем все тэги по посту при помощи взаимодействия многие ко многим
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
}
