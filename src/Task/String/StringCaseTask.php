<?php

namespace Strivex\Phing\Task\String;

use Phing\Task;
use Strivex\Commons\String\StringHelper;

class StringCaseTask extends Task {

    private $input;
    private $propertyName;
    private $actions;
    
    public function getInput() {
        return $this->input;
    }
    
    public function setInput($input): void {
        $this->input = $input;
    }
    
    public function getPropertyName() {
        return $this->propertyName;
    }
    
    public function setPropertyName($propertyName): void {
        $this->propertyName = $propertyName;
    }
    
    public function createLowercase() {
        return $this->createAction('lower');
    }
    
    public function createUppercase() {
        return $this->createAction('upper');
    }
    public function createPascalcase() {
        return $this->createAction('pascal');
    }
    
    public function createCamelcase() {
        return $this->createAction('camel');
    }
    
    public function createSnakecase() {
        return $this->createAction('snake');
    }
    
    public function createKebabcase() {
        return $this->createAction('kebab');
    }
    
    public function main() {
    
        // Get string helper.
        $stringHelper = new StringHelper();

        $originalValue = $this->getInput();
        
        // Loop actions.
        foreach($this->actions as $action) {
            // Determine method depending on action.
            $case = $action->getAction();
            $suffix = sprintf('%sCase', ucfirst($case));
            $method = sprintf('to%s', $suffix);
            
            // Check for method.
            if (method_exists($stringHelper, $method)) {
                
                // Determine param count.
                $reflection = new \ReflectionMethod($stringHelper, $method);
                $params = $reflection->getParameters();
                switch(count($params)) {
                    case 1:
                        $result = $stringHelper->$method($originalValue);
                        break;
                    case 3:
                        $result = $stringHelper->$method($originalValue, $action->getLeaveSlashes(), $action->getDelimiter());
                        break;
                    default:
                        // Nothing.
                }
            }
            
            $props = [];
            
            // Set properties.
            if ($action->getPropertyName()) {
                $props[] = $action->getPropertyName();
            }
            
            if ($this->getPropertyName()) {
                $props[] = sprintf('%s.%s', $this->getPropertyName(), $stringHelper->toLowerCase($suffix));
//            } else {
//                $props[] = sprintf('%s.%s', $this->getPropertyName(), $stringHelper->toLowerCase($suffix));
            }
            $this->log($result);
            foreach ($props as $prop) {
                $this->log('#=> ' . $prop);
                $this->getProject()->setProperty($prop, $result);
            }
        }
    }
    
    private function createAction($case) {
        $action = new StringCaseAction();
        $action->setAction($case);
        $this->actions[] = $action;
        return $action;
    }
}
