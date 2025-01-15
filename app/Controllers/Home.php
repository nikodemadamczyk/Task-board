<?php

namespace App\Controllers;
use App\Models\FirstModel;

class Home extends BaseController {
    
    public function index()
    {
        echo view('templates/header');
        echo view('templates/navigation');
        echo view('pages/startseite');
        echo view('templates/footer');
    }

    public function table()
    {
        echo view('templates/header');
        echo view('templates/navigation');
        echo view('pages/tableseite');
        echo view('templates/footer');
    }

    public function form()
    {
        echo view('templates/header');
        echo view('templates/navigation');
        echo view('pages/formseite');
        echo view('templates/footer');
    }
}
