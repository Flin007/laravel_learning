<?php

namespace App\Http\Controllers;



class PageIndexController extends Controller
{
    //Метод получения постов
    static function index()
    {
        return view('index');
    }
}
