<?php
namespace Strivex\Phing\Task\Json;

use Phing\Task;
use Strivex\Commons\Json\JsonEditor;
use Strivex\Phing\Task\Action\Json\AddAction;
use Strivex\Phing\Task\Action\Json\BumpAction;
use Strivex\Phing\Task\Action\Json\DeleteAction;
use Strivex\Phing\Task\Action\Json\GetAction;

class JsonEditTask extends Task {

    private $file;
    private $save = true;
    private $actions;
    
    public function setFile($file) {
        // Set value.
        $this->file = $file;
        // Return.
        return $this;
    }
    
    public function setSave(bool $save) {
        // Set value.
        $this->save = $save;
        // Return.
        return $this;
    }
    
    public function createAdd() {
        $action = new AddAction();
        $this->actions[] = $action;
        return $action;
    }
    
    public function createDelete() {
        $action = new DeleteAction();
        $this->actions[] = $action;
        return $action;
    }
    
    public function createGet() {
        $action = new GetAction();
        $this->actions[] = $action;
        return $action;
    }
    
    public function createBumpversion() {
        $action = new BumpAction();
        $this->actions[] = $action;
        return $action;
    }
    
    public function main() {
        if (empty($this->file)) {
            throw new \Exception('JSON file is required.');
        }
        
        $jsonEditor = new JsonEditor($this->file);
        
        foreach ($this->actions as $action) {
            $action->handleAction($this, $jsonEditor);
        }
        
        if ($this->save) {
            $this->log(sprintf('Saving %s', $this->file));
            $jsonEditor->save();
        } else {
            $this->log(sprintf('%s not being saved.', $this->file));
        }
    }
}