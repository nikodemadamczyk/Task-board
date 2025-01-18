<?php

namespace App\Controllers;

use App\Models\SpaltenModel;
class Spalten extends BaseController
{
    protected $spaltenModel;

    public function __construct()
    {
        $this -> spaltenModel = new SpaltenModel();
    }

    public function getindex()
    {
        $data['spalten'] = $this -> spaltenModel ->getSpalten();

        echo view('templates/header');
        echo view('templates/navigation');
        echo view('pages/spalten/list', $data);
        echo view('templates/footer');
    }

    public function getcreate()
    {
        echo view('templates/header');
        echo view('templates/navigation');
        echo view('pages/spalten/form');
        echo view('templates/footer');
    }

    public function poststore()
    {
        if (!$this->validate('spalten')) {
            return view('templates/header')
                . view('templates/navigation')
                . view('pages/spalten/form', ['validation' => $this->validator])
                . view('templates/footer');
        }

        $data = [
            'boards_id' => $this->request->getPost('boards_id'),
            'sort_id' => $this->request->getPost('sort_id'),
            'spalte' => $this->request->getPost('spalte'),
            'spaltenbeschreibung' => $this->request->getPost('spaltenbeschreibung')
        ];

        if ($this->spaltenModel->createSpalte($data)) {
            return redirect()->to(base_url('spalten'))
                ->with('success', 'Spalte wurde erfolgreich erstellt');
        } else {
            return redirect()->back()
                ->with('error', 'Fehler beim Erstellen der Spalte')
                ->withInput();
        }
    }

    public function getedit($id)
    {
        $data['spalte'] = $this->spaltenModel->getSpaltenById($id);

        if (empty($data['spalte'])) {
            return redirect()->to(base_url('spalten'))
                ->with('error', 'Spalte nicht gefunden');
        }


        echo view('templates/header');
        echo view('templates/navigation');
        echo view('pages/spalten/form', $data);
        echo view('templates/footer');
    }


    public function postupdate($id)
    {
        if (!$this->validate('spalten')) {
            return view('templates/header')
                . view('templates/navigation')
                . view('pages/spalten/form', [
                    'validation' => $this->validator,
                    'spalte' => $this->spaltenModel->getSpaltenById($id)
                ])
                . view('templates/footer');
        }

        $data = [
            'boards_id' => $this->request->getPost('boards_id'),
            'sort_id' => $this->request->getPost('sort_id'),
            'spalte' => $this->request->getPost('spalte'),
            'spaltenbeschreibung' => $this->request->getPost('spaltenbeschreibung')
        ];

        if ($this->spaltenModel->updateSpalte($id, $data)) {
            return redirect()->to(base_url('spalten'))
                ->with('success', 'Spalte wurde erfolgreich aktualisiert');
        } else {
            return redirect()->back()
                ->with('error', 'Fehler beim Aktualisieren der Spalte')
                ->withInput();
        }
    }

    public function getdelete($id)
    {
        if ($this->spaltenModel->deleteSpalte($id)) {
            return redirect()->to(base_url('spalten'))
                ->with('success', 'Spalte wurde erfolgreich gelöscht');
        } else {
            return redirect()->back()
                ->with('error', 'Fehler beim Löschen der Spalte');
        }
    }
}