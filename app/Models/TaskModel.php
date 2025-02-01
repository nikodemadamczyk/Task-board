<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'tasks_id';
    protected $allowedFields = [
        'personen_id',
        'taskarten_id',
        'spalten_id',
        'sort_id',
        'tasks',
        'erstelldatum',
        'erinnerungsdatum',
        'erinnerung',
        'notizen',
        'erledigt',
        'geloescht'
    ];


    public function getTasks()
    {
        $tasks = $this->db->table('tasks')
            ->select('
            tasks.*, 
            personen.vorname, 
            personen.name, 
            taskarten.taskart, 
            taskarten.taskartenicon,
            spalten.spalte,
            spalten.spaltenbeschreibung,
            spalten.boards_id,
            spalten.sort_id
        ')
            ->join('personen', 'personen.personen_id = tasks.personen_id')
            ->join('taskarten', 'taskarten.taskarten_id = tasks.taskarten_id')
            ->join('spalten', 'spalten.spalten_id = tasks.spalten_id')
            ->where('tasks.geloescht', 0)
            ->orderBy('spalten.sort_id', 'ASC')
            ->orderBy('tasks.tasks', 'ASC')
            ->get()
            ->getResultArray();

        // Modyfikujemy wyniki, aby uwzględnić status erledigt
        $modifiedTasks = array_map(function($task) {
            // Jeśli zadanie jest zakończone, zmieniamy jego "spalte" na "Erledigt"
            if ($task['erledigt'] == 1) {
                $task['spalte'] = 'Erledigt';
            }
            return $task;
        }, $tasks);

        return $modifiedTasks;
    }

    public function getTaskById($taskId)
    {
        return $this->db->table('tasks')
            ->select('
                tasks.*, 
                personen.vorname, 
                personen.name, 
                taskarten.taskart, 
                taskarten.taskartenicon,
                spalten.spalte,
                spalten.spaltenbeschreibung,
                spalten.boards_id,
                spalten.sort_id
            ')
            ->join('personen', 'personen.personen_id = tasks.personen_id')
            ->join('taskarten', 'taskarten.taskarten_id = tasks.taskarten_id')
            ->join('spalten', 'spalten.spalten_id = tasks.spalten_id')
            ->where('tasks.tasks_id', $taskId)
            ->get()
            ->getRowArray();
    }

    public function updateTask($taskId, $data)
    {
        try {
            $this->db->transStart();
            $this->update($taskId, $data);
            $this->db->transComplete();

            if ($this->db->transStatus() === false) {
                log_message('error', 'Transaction failed in updateTask');
                return false;
            }

            return true;
        } catch (\Exception $e) {
            log_message('error', 'Error in updateTask: ' . $e->getMessage());
            throw $e;
        }
    }



    public function deleteTask($taskId)
    {
        return $this->update($taskId, ['geloescht' => 1]);
    }

    public function createTask($data)
    {

        $data['erstelldatum'] = date('Y-m-d');
        $data['sort_id'] = 1;
        $data['erledigt'] = 0;
        $data['geloescht'] = 0;

        try {

            $this->db->transStart();
            $this->insert($data);
            $this->db->transComplete();

            if ($this->db->transStatus() === false) {
                log_message('error', 'Transaction failed');
                return false;
            }

            return true;

        } catch (\Exception $e) {
            log_message('error', 'Error in createTask: ' . $e->getMessage());
            throw $e;
        }
    }
}