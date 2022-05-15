<?php

namespace App\Http\Controllers;



class PageContactsController extends Controller
{
    //Метод получения постов
    static function index()
    {
        return view('contacts');
    }
}
