<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskArtModel extends Model
{
    protected $table = 'taskarten';
    protected $primaryKey = 'taskarten_id';
    protected $allowedFields = ['taskart', 'taskartenicon'];

    public function getAllTaskArts()
    {
        return $this->findAll();
    }
}