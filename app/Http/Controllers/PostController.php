<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //Метод получения постов
    static function index()
    {

    }

    //Метод для создания новых записей
    static function create()
    {

    }

    //store
    static function store()
    {

    }

    //show
    static function show(Post $post)
    {

    }

    //edit
    static function edit(Post $post){

    }

    //update
    static function update(Post $post)
    {

    }

    //destroy
    static function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

}
