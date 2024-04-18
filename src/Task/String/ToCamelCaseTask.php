<?php
namespace Strivex\Phing\Task\String;

use Phing\Task;

class ToCamelCaseTask extends AbstractStringCaseTask {
    
    public function main() {
        
        // Set property.
        $this->getProject()->setProperty($this->propertyName, $this->toCamelCase($this->input, $this->leaveSlashes));
    }
}