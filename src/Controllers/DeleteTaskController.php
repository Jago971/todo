<?php

namespace App\Controllers;

use App\Models\TasksModel;
use Slim\Views\PhpRenderer;

class DeleteTaskController
{
    private $model;
    private $view;
    public function __construct( TasksModel $model, PhpRenderer $view)
    {
        $this->model = $model;
        $this->view = $view;
    }
    public function __invoke($request, $response, $args)
    {
        $JSON = $request->getParsedBody();
        $id = $JSON['id'];
        $page = $JSON['page'];

        if ($page === 'completed') {
            $newTasks = $this->model->deleteTask($id, 1);
            return $this->view->render($response, "completedTasks.php", ['tasks' => $newTasks]);
        } elseif ($page === 'uncompleted') {
            $newTasks = $this->model->deleteTask($id, 0);
            return $this->view->render($response, "uncompletedTasks.php", ['tasks' => $newTasks]);
        }
    }
}