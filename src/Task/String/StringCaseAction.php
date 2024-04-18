<?php
namespace Strivex\Phing\Task\String;

class StringCaseAction {
    
    private $leaveSlashes;
    private $delimiter;
    private $propertyName;

    private $action;
    
    public function getLeaveSlashes() {
        return $this->leaveSlashes;
    }
    
    public function setLeaveSlashes($leaveSlashes): void {
        $this->leaveSlashes = $leaveSlashes;
    }
    
    public function getDelimiter() {
        return $this->delimiter;
    }
    
    public function setDelimiter($delimiter): void {
        $this->delimiter = $delimiter;
    }
    
    public function getPropertyName() {
        return $this->propertyName;
    }
    
    public function setPropertyName($propertyName): void {
        $this->propertyName = $propertyName;
    }
    
    public function getAction() {
        return $this->action;
    }
    
    public function setAction($action): void {
        $this->action = $action;
    }
}