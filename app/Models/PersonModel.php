<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonModel extends Model
{
    protected $table = 'personen';
    protected $primaryKey = 'personen_id';
    protected $allowedFields = ['vorname', 'name', 'email', 'passwort'];

    public function getAllPersons()
    {
        return $this->findAll();
    }
}