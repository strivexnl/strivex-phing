<?php
namespace Strivex\Phing\Task\Action\Json;

use Phing\Task;
use Strivex\Commons\Json\JsonEditor;
use Strivex\Phing\Task\Action\TaskActionInterface;

class GetAction implements TaskActionInterface {
    
    private $key;
    private $propertyName;
    
    public function setKey($key) {
        
        // Set value.
        $this->key = $key;
        // Return.
        return $this;
    }
    
    public function setPropertyName($propertyName) {
        
        // Set value.
        $this->propertyName = $propertyName;
        // Return.
        return $this;
    }
    
    public function handleAction(Task $task, JsonEditor $jsonEditor) {
        $value = $jsonEditor->get($this->key);
        
        if ($value) {
            $task->getProject()->setProperty($this->propertyName, $value);
        }
    }
}