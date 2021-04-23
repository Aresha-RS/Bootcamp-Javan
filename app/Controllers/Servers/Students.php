<?php

namespace App\Controllers\Servers;

use App\Controllers\BaseController;
use App\Models\StudentsModel;

class Students extends BaseController
{

    protected $StudentsModel;

    public function __construct()
    {
        $this->StudentsModel = new StudentsModel();
    }

    public function index()
    {
        $students = $this->StudentsModel->findAll();
        $data = array(
            'title' => 'Students || Bootcamp Javan',
            'students' => $students
        );
        return view('pages/students/index', $data);
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
