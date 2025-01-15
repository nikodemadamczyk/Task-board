<?php

namespace App\Models;

use CodeIgniter\Model;

class SpaltenModel extends Model
{
    protected $table = 'spalten';
    protected $primaryKey = 'spalten_id';
    protected $allowedFields = ['boards_id', 'sort_id', 'spalte', 'spaltenbeschreibung'];

    public function getAllSpalten()
    {
        return $this->orderBy('sort_id', 'ASC')->findAll();
    }

    public function getSpaltenByBoard($boardId)
    {
        return $this->where('boards_id', $boardId)
            ->orderBy('sort_id', 'ASC')
            ->findAll();
    }
}