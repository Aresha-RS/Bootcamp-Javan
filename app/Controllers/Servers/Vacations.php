<?php

namespace App\Controllers\Servers;

use App\Controllers\BaseController;
use App\Models\VacationsModel;

class Vacations extends BaseController
{
    protected $VacationsModel;

    public function __construct()
    {
        $this->VacationsModel = new VacationsModel();
    }

    public function index()
    {
        $vacations = $this->VacationsModel->findAll();
        $data = array(
            'title' => 'Vacation || Bootcamp Javan',
            'vacations' => $vacations
        );
        return view('pages/vacation/index', $data);
    }

    public function created()
    {
    }

    public function view()
    {
    }

    public function updated()
    {
    }

    public function deleted()
    {
    }
}
