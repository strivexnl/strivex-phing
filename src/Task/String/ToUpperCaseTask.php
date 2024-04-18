<?php
namespace Strivex\Phing\Task\String;

use Phing\Task;

class ToUpperCaseTask extends AbstractStringCaseTask {
    
    public function main() {
        $this->getProject()->setProperty($this->propertyName, $this->toUpperCase($this->input));
    }
}
