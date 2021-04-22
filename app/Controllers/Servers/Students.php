<?php

namespace App\Controllers\Servers;

use App\Controllers\BaseController;

class Students extends BaseController
{
    public function index()
    {
        $data = array(
            'title' => 'Students || Bootcamp Javan'
        );
        return view('pages/students/index', $data);
    }
}
