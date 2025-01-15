<?php
namespace App\Models;
use CodeIgniter\Model;

class FirstModel extends Model {
    public function getData() {
        $this->personen = $this->db->table('personen');
        $this->personen->select('*');
        $result = $this->personen->get();
        return $result->getResultArray();
    }
}