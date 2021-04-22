<?php

namespace App\Controllers\Servers;

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index()
    {
        $data = array(
            'title' => 'Users || Bootcamp Javan'
        );
        return view('pages/users/index', $data);
    }
}
