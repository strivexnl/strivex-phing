<?php
namespace Strivex\Phing\Task\Action\Json;

use Phing\Task;
use Strivex\Commons\Json\JsonEditor;
use Strivex\Phing\Task\Action\TaskActionInterface;

class DeleteAction implements TaskActionInterface {
    
    private $key;
    
    public function setKey($key) {
        
        // Set value.
        $this->key = $key;
        // Return.
        return $this;
    }

    
    public function handleAction(Task $task, JsonEditor $jsonEditor) {
        $jsonEditor->delete($this->key);
    }
}