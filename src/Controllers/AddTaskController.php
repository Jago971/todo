<?php

namespace App\Controllers;

use App\Models\TasksModel;
use Slim\Views\PhpRenderer;

class AddTaskController
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
        $task = $request->getParsedBody();
        if($task['description']) {
            $newTasks = $this->model->addTask($task);
        } else {
            $newTasks = $this->model->getUncompletedTasks();
        }
        return $response->withHeader('Location', '/taskZ')->withStatus(301);
    }
}