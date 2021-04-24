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

    public function fetch()
    {
        $vacations = $this->VacationsModel->findAll();
        echo json_encode([
            "success" => true,
            "rows" => $vacations
        ]);
    }

    public function created()
    {
        $this->VacationsModel->protect(false);
        $process = $this->VacationsModel->save([
            'name' => $this->input->getPost("kode"),
            'description' => $this->input->getPost('nama')
        ]);
        if ($process) {
            echo json_encode([
                "success" => true,
                "message" => "Data berhasil ditambahkan..!"
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Data gagal ditambahkan..!"
            ]);
        }
    }

    public function updated()
    {
        $key = $this->input->getPost("id");
        $this->VacationsModel->protect(false);
        $data = [
            "name" => $this->input->getPost("kode"),
            "description" => $this->input->getPost("nama")
        ];
        if ($key != null && $key > 0) {
            $process = $this->VacationsModel->update($key, $data);
            if ($process) {
                echo json_encode([
                    "success" => true,
                    "message" => "Success updated vacation !"
                ]);
            } else {
                echo json_encode([
                    "success" => false,
                    "message" => "Failed updated vacation !"
                ]);
            }
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Record or parameter not found !"
            ]);
        }
    }

    public function deleted()
    {
        $key = $this->input->getPost("id");
        $this->VacationsModel->protect(false);
        $process = $this->VacationsModel->where('id', $key)->delete();
        if ($process) {
            echo json_encode([
                "success" => true,
                "message" => "Success deleted vacation !"
            ]);
        }
    }
}
