<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //Явно указываем таблицу, с которой работает модель
    protected $table = 'posts';

    //Кастомное свойство
    public $customProperty;
}
