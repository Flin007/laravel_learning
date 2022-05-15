<?php

namespace App\Http\Controllers;



class PageAboutController extends Controller
{
    //Метод получения постов
    static function index()
    {
        return view('about');
    }
}
