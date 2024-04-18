<?php
namespace Strivex\Phing\Task\String;

use Phing\Task;

class ToKebabCaseTask extends AbstractStringCaseTask {
    
    public function main() {
        
        // Set property.
        $this->getProject()->setProperty($this->propertyName, $this->toKebabCase($this->input, $this->leaveSlashes));
    }
}