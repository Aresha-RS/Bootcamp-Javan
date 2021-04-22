<?php

namespace App\Controllers\Servers;

use App\Controllers\BaseController;

class Students extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
}
