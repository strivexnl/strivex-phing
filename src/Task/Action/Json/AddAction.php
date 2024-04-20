<?php
namespace Strivex\Phing\Task\Action\Json;

use Phing\Task;
use Strivex\Commons\Json\JsonEditor;
use Strivex\Phing\Task\Action\TaskActionInterface;

class AddAction implements TaskActionInterface {
    
    private $key;
    private $value;
    private $overwrite = true;
    
    public function setKey($key) {
        
        // Set value.
        $this->key = $key;
        // Return.
        return $this;
    }

    public function setValue($value) {
        
        $decoded = json_decode($value, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            $this->value = $decoded;
        } else {
            $this->value = $value;
        }
        
        // Return.
        return $this;
    }
    
    public function setOverwrite($overwrite) {
        
        // Set value.
        $this->overwrite = filter_var($overwrite, FILTER_VALIDATE_BOOLEAN);
        // Return.
        return $this;
    }
    
    public function handleAction(Task $task, JsonEditor $jsonEditor) {
        
        $jsonEditor->add($this->key, $this->value, $this->overwrite);
    }
}