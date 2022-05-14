<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function first(){
        return 'There is first';
    }

    public function second(){
        return 'There is second';
    }
}
