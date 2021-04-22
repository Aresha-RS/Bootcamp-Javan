<?php

namespace App\Controllers\Servers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = array(
            'title' => 'Dashboard Management System'
        );
        return view('pages/dashboard', $data);
    }
}
