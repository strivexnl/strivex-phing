<?php
namespace Strivex\Phing\Task\String;

use Phing\Task;

class ToLowerCaseTask extends AbstractStringCaseTask {
    
    public function main() {
        $this->getProject()->setProperty($this->propertyName, $this->toLowerCase($this->input));
    }
}
