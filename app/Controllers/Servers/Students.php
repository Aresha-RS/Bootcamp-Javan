<?php

namespace App\Controllers\Servers;

use App\Controllers\BaseController;
use App\Models\StudentsModel;
use App\Models\VacationsModel;

class Students extends BaseController
{

    protected $StudentsModel;
    protected $VacationsModel;

    public function __construct()
    {
        $this->StudentsModel = new StudentsModel();
        $this->VacationsModel =  new VacationsModel();
    }

    public function index()
    {
        $vacations = $this->VacationsModel->findAll();
        $data = array(
            'title' => 'Students || Bootcamp Javan',
            'vacations' => $vacations
        );
        return view('pages/students/index', $data);
    }

    public function fetch()
    {
        $students = $this->StudentsModel->getStudents();
        echo json_encode([
            "success" => true,
            "rows" => $students
        ]);
    }

    public function created()
    {
        $this->StudentsModel->protect(false);
        $process = $this->StudentsModel->save([
            'nis' => $this->input->getPost("nis"),
            'nama' => $this->input->getPost("nama"),
            'kelas' => $this->input->getPost("kelas"),
            'vacation_id' => $this->input->getPost("kejuruan"),
            'email' => $this->input->getPost("email"),
            'phone' => $this->input->getPost("telepon"),
            'alamat' => $this->input->getPost("alamat"),
        ]);
        if ($process) {
            echo json_encode([
                "success" => true,
                "message" => "Berhasil menambahkan siswa baru..!"
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Gagal menambahkan siswa baru..!"
            ]);
        }
    }

    public function deleted()
    {
        $key = $this->input->getPost("id");
        $process = $this->StudentsModel->where('id', $key)->delete();
        if ($process) {
            echo json_encode([
                "success" => true,
                "message" => "Success deleted students !"
            ]);
        }
    }

    public function updated()
    {
        $key = $this->input->getPost("id");
        $this->StudentsModel->protect(false);
        $data = [
            "nis" => $this->input->getPost("nis"),
            "nama" => $this->input->getPost("nama"),
            "kelas" => $this->input->getPost("kelas"),
            "vacation_id" => $this->input->getPost("kejuruan"),
            "email" => $this->input->getPost("email"),
            "phone" => $this->input->getPost("telepon"),
            "alamat" => $this->input->getPost("alamat")
        ];
        if ($key != null && $key > 0) {
            $process = $this->StudentsModel->update($key, $data);
            if ($process) {
                echo json_encode([
                    "success" => true,
                    "message" => "Success updated student data !"
                ]);
            } else {
                echo json_encode([
                    "success" => false,
                    "message" => "Failed updated student data !"
                ]);
            }
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Record or parameter not found !"
            ]);
        }
    }
}
