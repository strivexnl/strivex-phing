<?php
namespace Strivex\Phing\Task\String;

use Phing\Task;

class ToSnakeCaseTask extends AbstractStringCaseTask {
    
    public function main() {
        
        // Set property.
        $this->getProject()->setProperty($this->propertyName, $this->toSnakeCase($this->input, $this->leaveSlashes));
    }
}