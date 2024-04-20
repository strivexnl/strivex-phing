<?php
namespace Strivex\Phing\Task\Action;

use Phing\Task;
use Strivex\Commons\Json\JsonEditor;

interface TaskActionInterface {

    public function handleAction(Task $task, JsonEditor $jsonEditor);
}