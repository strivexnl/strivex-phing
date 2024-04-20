<?php
namespace Strivex\Phing\Task\Action\Json;

use Phing\Task;
use Strivex\Commons\Json\JsonEditor;
use Strivex\Phing\Task\Action\TaskActionInterface;

class BumpAction implements TaskActionInterface {
    
    private $key;
    private $type;
    private $startPreRelease = false;
    private $overwrite = true;
    
    public function setKey($key) {
        
        // Set value.
        $this->key = $key;
        // Return.
        return $this;
    }
    
    public function setType($type) {
        
        // Set value.
        $this->type = $type;
        // Return.
        return $this;
    }
    
    public function setStartPreRelease($startPreRelease) {
        
        $decoded = json_decode($startPreRelease, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            $this->startPreRelease = $decoded;
        } else {
            $this->startPreRelease = $startPreRelease;
        }
        
        // Return.
        return $this;
    }
    
    public function setOverwrite($overwrite) {
        
        $decoded = json_decode($overwrite, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            $this->overwrite = $decoded;
        } else {
            $this->overwrite = $overwrite;
        }
        // Return.
        return $this;
    }
    
    public function handleAction(Task $task, JsonEditor $jsonEditor) {
        
        switch($this->type) {
            case $jsonEditor::BUMPTYPE_MAJOR:
            case $jsonEditor::BUMPTYPE_MINOR:
            case $jsonEditor::BUMPTYPE_PATCH:
            case $jsonEditor::BUMPTYPE_ALPHA:
            case $jsonEditor::BUMPTYPE_BETA:
            case $jsonEditor::BUMPTYPE_RC:
                $jsonEditor->bumpVersion($this->key, $this->type, $this->startPreRelease, $this->overwrite);
                break;
            default:
                throw new \Exception(sprintf('Type (%s) is invalid.', $this->type));
        }
    }
}