<?php

namespace App\Http\Controllers\Admin;


class AdminIndexController extends BaseController
{
    public function __invoke()
    {
        return view('admin.index');
    }

}

