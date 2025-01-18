<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    protected $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }


    public function getindex()

    {
        $data['tasks'] = $this->taskModel->getTasks();
        $data['tasksByColumn'] = [];
        foreach ($data['tasks'] as $task) {
            $boardId = $task['boards_id'];
            $spalte = $task['spalte'];
            $data['tasksByColumn'][$boardId][$spalte][] = $task;
        }

        echo view('templates/header');
        echo view('templates/navigation');
        echo view('pages/tasks', $data);
        echo view('templates/footer');
    }


    public function getcreate()
    {
        echo view('templates/header');
        echo view('templates/navigation');
        echo view('pages/formseite');
        echo view('templates/footer');
    }

    public function getedit($id)
    {
        $data['task'] = $this->taskModel->getTaskById($id);

        if (empty($data['task'])) {
            return redirect()->to(base_url('tasks'))
                ->with('error', 'Task nicht gefunden');
        }

        echo view('templates/header');
        echo view('templates/navigation');
        echo view('pages/formseite', $data);
        echo view('templates/footer');
    }

    public function postupdate($id)
    {
        if (!$this->validate('tasks')) {
            $data['task'] = $this->taskModel->getTaskById($id);
            return view('templates/header')
                . view('templates/navigation')
                . view('pages/formseite', [
                    'validation' => $this->validator,
                    'task' => $data['task']
                ])
                . view('templates/footer');
        }

        try {
            $data = [
                'personen_id' => (int)$this->request->getPost('personen_id'),
                'taskarten_id' => (int)$this->request->getPost('taskarten_id'),
                'spalten_id' => (int)$this->request->getPost('spalten_id'),
                'tasks' => $this->request->getPost('tasks'),
                'erinnerungsdatum' => $this->request->getPost('erinnerungsdatum') ?: null,
                'erinnerung' => (int)$this->request->getPost('erinnerung'),
                'notizen' => $this->request->getPost('notizen')
            ];

            $result = $this->taskModel->updateTask($id, $data);

            if ($result) {
                return redirect()->to(base_url('tasks'))
                    ->with('success', 'Task wurde erfolgreich aktualisiert');
            } else {
                throw new \RuntimeException('Failed to update task');
            }

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Fehler beim Aktualisieren des Tasks: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function poststore()
    {
        if (!$this->validate('tasks')) {
            return view('templates/header')
                . view('templates/navigation')
                . view('pages/formseite', ['validation' => $this->validator])
                . view('templates/footer');
        }

        try {
            $data = [
                'personen_id' => (int)$this->request->getPost('personen_id'),
                'taskarten_id' => (int)$this->request->getPost('taskarten_id'),
                'spalten_id' => (int)$this->request->getPost('spalten_id'),
                'tasks' => $this->request->getPost('tasks'),
                'erinnerungsdatum' => $this->request->getPost('erinnerungsdatum') ?: null,
                'erinnerung' => (int)$this->request->getPost('erinnerung'),
                'notizen' => $this->request->getPost('notizen')
            ];

            if ($this->taskModel->createTask($data)) {
                return redirect()->to(base_url('tasks'))
                    ->with('success', 'Task wurde erfolgreich erstellt');
            } else {
                throw new \RuntimeException('Failed to create task');
            }
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Fehler beim Erstellen des Tasks: ' . $e->getMessage())
                ->withInput();
        }
    }


    public function getdelete($id)
    {
        if ($this->taskModel->deleteTask($id)) {
            return redirect()->to(base_url('tasks'))
                ->with('success', 'Task wurde erfolgreich gelöscht');
        } else {
            return redirect()->back()
                ->with('error', 'Fehler beim Löschen des Tasks');
        }
    }
}
