<?php

namespace App\Models;

use CodeIgniter\Model;

class SpaltenModel extends Model
{
    protected $table = 'spalten';
    protected $primaryKey = 'spalten_id';
    protected $allowedFields = [
        'boards_id',
        'sort_id',
        'spalte',
        'spaltenbeschreibung'
    ];

    public function getSpalten()
    {
        return $this->db->table('spalten')
            ->select('spalten.*, boards.board as board_name')
            ->join('boards', 'boards.boards_id = spalten.boards_id')
            ->orderBy('spalten.sort_id', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getSpaltenById($spaltenId)
    {
        return $this->db->table('spalten')
            ->select('spalten.*, boards.board as board_name')
            ->join('boards', 'boards.boards_id = spalten.boards_id')
            ->where('spalten.spalten_id', $spaltenId)
            ->get()
            ->getRowArray();
    }

    public function createSpalte($data)
    {
        return $this->insert($data);
    }

    public function updateSpalte($spaltenId, $data)
    {
        return $this->update($spaltenId, $data);
    }

    public function deleteSpalte($spaltenId)
    {
        $this->db->table('tasks')
            ->where('spalten_id', $spaltenId)
            ->update(['geloescht' => 1]);

        return $this->delete($spaltenId);
    }
}