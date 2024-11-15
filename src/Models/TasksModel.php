<?php

namespace App\Models;

use PDO;

class TasksModel
{
    protected PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function getUncompletedTasks()
    {
        $query = $this->db->prepare("SELECT * FROM `tasks` WHERE `completed` = '0';");
        $query->execute();
        return $query->fetchAll();
    }
    public function getCompletedTasks()
    {
        $query = $this->db->prepare("SELECT * FROM `tasks` WHERE `completed` = '1';");
        $query->execute();
        return $query->fetchAll();
    }
    public function addTask($task)
    {
        $query = $this->db->prepare('INSERT INTO `tasks` (`description`, `completed`) VALUES (:description, 0);');
        $query->execute([
            'description' => $task['description']
        ]);
        return $this->getUncompletedTasks();
    }

    public function markTaskComplete($task)
    {
        $query = $this->db->prepare("UPDATE tasks SET completed = '1' WHERE id = :id;");
        $query->execute([
            'id' => $task
        ]);
        return $this->getUncompletedTasks();
    }
    public function deleteTask($task, $completed)
    {
        $query = $this->db->prepare("DELETE FROM `tasks` WHERE id = :id;");
        $query->execute([
            'id' => $task
        ]);
        $query = $this->db->prepare("SELECT * FROM `tasks` WHERE `completed` = '".$completed."';");
        $query->execute();
        return $query->fetchAll();
    }
}