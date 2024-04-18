<?php
namespace Strivex\Phing\Task\String;

use Phing\Task;
use Strivex\Commons\String\StringHelper;

abstract class AbstractStringCaseTask extends Task {
    
    protected $stringHelper;
    protected $input;
    
    protected $propertyName;
    
    protected $leaveSlashes = false;
    
    protected $delimiter    = '/';
    
    public function __construct() {
        parent::__construct();
        $this->stringHelper = new StringHelper();
    }
    public function setInput($value) {
        $this->input = $value;
    }
    
    public function setPropertyName($value) {
        $this->propertyName = $value;
    }
    
    public function setLeaveSlashes($value) {
        $this->leaveSlashes = (bool)$value;
    }
    
    public function setDelimiter($value) {
        $this->delimiter = $value;
    }
    
    abstract public function main();
    
    public function toLowerCase($string) {
        return $this->stringHelper->toLowerCase($string);
    }
    
    public function toUpperCase($string) {
        return $this->stringHelper->toUpperCase($string);
    }
    
    public function toPascalCase($string, $leaveSlashes, $delimiter="/") {
        return $this->stringHelper->toPascalCase($string, $leaveSlashes, $delimiter);
    }
    
    public function toCamelCase($string, $leaveSlashes, $delimiter="/") {
        return $this->stringHelper->toCamelCase($string, $leaveSlashes, $delimiter);
    }
    
    public function toSnakeCase($string, $leaveSlashes, $delimiter="/") {
        return $this->stringHelper->toSnakeCase($string, $leaveSlashes, $delimiter);
    }

    public function toKebabCase($string, $leaveSlashes, $delimiter="/") {
        return $this->stringHelper->toKebabCase($string, $leaveSlashes, $delimiter);
    }
}