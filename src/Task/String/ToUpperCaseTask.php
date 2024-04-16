<?php
namespace Strivex\Phing\Task\String;

use Phing\Task;

class ToUpperCaseTask extends Task {
    
    private $input;
    private $propertyName;
    
    public function setInput($value) {
        $this->input = $value;
    }
    
    public function setPropertyName($value) {
        $this->propertyName = $value;
    }
    
    public function main() {
        $this->getProject()->setProperty($this->propertyName, strtoupper($this->input));
    }
}
