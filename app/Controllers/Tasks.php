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

    public function getcopy($id)
    {
        // Get the original task
        $originalTask = $this->taskModel->getTaskById($id);

        if (empty($originalTask)) {
            return redirect()->to(base_url('tasks'))
                ->with('error', 'Task nicht gefunden');
        }

        // Create a new task array for the form
        $data['task'] = [
            'tasks_id' => null, // Clear ID for new task
            'tasks' => 'Kopie - ' . $originalTask['tasks'],
            'personen_id' => $originalTask['personen_id'],
            'taskarten_id' => $originalTask['taskarten_id'],
            'spalten_id' => $originalTask['spalten_id'],
            'erinnerungsdatum' => $originalTask['erinnerungsdatum'],
            'erinnerung' => $originalTask['erinnerung'],
            'notizen' => $originalTask['notizen']
        ];

        echo view('templates/header');
        echo view('templates/navigation');
        echo view('pages/formseite', $data);
        echo view('templates/footer');
    }

    public function postsubmit($id = null)
    {
        if (!$this->validate('tasks')) {
            return view('templates/header')
                . view('templates/navigation')
                . view('pages/formseite', [
                    'validation' => $this->validator,
                    'task' => $this->request->getPost()
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
                'notizen' => $this->request->getPost('notizen'),
                'erstelldatum' => date('Y-m-d'),
                'sort_id' => 1,
                'erledigt' => 0,
                'geloescht' => 0
            ];

            if ($id === null) {
                // Create new task
                $this->taskModel->insert($data);
            } else {
                // Update existing task
                $this->taskModel->update($id, $data);
            }

            return redirect()->to(base_url('tasks'))
                ->with('success', 'Task wurde erfolgreich ' . ($id ? 'aktualisiert' : 'erstellt'));

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Fehler beim ' . ($id ? 'Aktualisieren' : 'Erstellen') . ' des Tasks: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function postmarkComplete($id)
    {
        try {
            $result = $this->taskModel->update($id, ['erledigt' => 1]);
            if ($result) {
                return redirect()->to(base_url('tasks'))
                    ->with('success', 'Task wurde als erledigt markiert');
            }
            throw new \RuntimeException('Failed to mark task as complete');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Fehler beim Markieren des Tasks: ' . $e->getMessage());
        }
    }

    public function postmarkIncomplete($id)
    {
        try {
            $result = $this->taskModel->update($id, ['erledigt' => 0]);
            if ($result) {
                return redirect()->to(base_url('tasks'))
                    ->with('success', 'Task wurde als nicht erledigt markiert');
            }
            throw new \RuntimeException('Failed to mark task as incomplete');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Fehler beim Markieren des Tasks: ' . $e->getMessage());
        }
    }
}
