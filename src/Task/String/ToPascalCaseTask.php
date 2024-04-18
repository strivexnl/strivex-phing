<?php
namespace Strivex\Phing\Task\String;

use Phing\Task;

class ToPascalCaseTask extends AbstractStringCaseTask {
    
    public function main() {
        
        // Set property.
        $this->getProject()->setProperty($this->propertyName, $this->toPascalCase($this->input, $this->leaveSlashes));
    }
}