<?php
declare(strict_types=1);

use Slim\App;
use Slim\Views\PhpRenderer;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/taskZ', \App\Controllers\UncompletedTasksController::class);
    $app->get('/taskZ/completed', \App\Controllers\CompletedTasksController::class);
    $app->post('/taskZ', \App\Controllers\AddTaskController::class);
    // changed url
    $app->put('/taskZ', \App\Controllers\MarkCompletedController::class);
    //chang verb - receive json delivered by script run on button???
    $app->delete('/taskZ', \App\Controllers\DeleteTaskController::class);
    //change verb - receive json delivered by script run on button???
};
