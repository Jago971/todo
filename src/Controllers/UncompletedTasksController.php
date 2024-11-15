<?php

namespace App\Controllers;

use App\Models\TasksModel;
use Slim\Views\PhpRenderer;

class UncompletedTasksController
{
    private $model;
    private $view;
    public function __construct(TasksModel $model, PhpRenderer $view)
    {
        $this->model = $model;
        $this->view = $view;
    }
    public function __invoke($request, $response, $args)
    {
        $tasks = $this->model->getUncompletedTasks();
        return $this->view->render($response, "uncompletedTasks.php", ['tasks' => $tasks]);
    }
}