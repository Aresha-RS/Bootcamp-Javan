<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentsModel extends Model
{
    protected $table = 'students';

    public function getStudents()
    {
        return $this->db->table('students')
            ->join('vacations', 'vacations.id=students.vacation_id')
            ->get()->getResultArray();
    }

    public function insertStudents($key, $data)
    {
        return $this->db->table('students')->update($data, $key);
    }

    public function updateStudents($key)
    {
        return $this->db->table('students')->where('id', $key)->delete();
    }
}
