<?php
namespace Swagger\ApiDeclaration\Api\Operation;

use Swagger\Document;
use InvalidArgumentException;

class Parameter extends Document {
    public function getParamType() {
        if(!property_exists($this->getDocument(), 'paramType')) {
            return null;
        }
        return $this->getDocument()->paramType;
    }
    
    public function setParamType($paramType) {
        $this->getDocument()->paramType = $paramType;
        return $this;
    }
    
    public function getName() {
        if(!property_exists($this->getDocument(), 'name')) {
            return null;
        }
        return $this->getDocument()->name;
    }
    
    public function setName($name) {
        $this->getDocument()->name = $name;
        return $this;
    }
    
    public function getDescription() {
        if(!property_exists($this->getDocument(), 'description')) {
            return null;
        }
        return $this->getDocument()->description;
    }
    
    public function setDescription($description) {
        $this->getDocument()->description = $description;
        return $this;
    }
    
    public function getDataType() {
        if(!property_exists($this->getDocument(), 'dataType')) {
            return null;
        }
        return $this->getDocument()->dataType;
    }
    
    public function setDataType($dataType) {
        $this->getDocument()->dataType = $dataType;
        return $this;
    }
    
    public function getFormat() {
        if(!property_exists($this->getDocument(), 'format')) {
            return null;
        }
        return $this->getDocument()->format;
    }
    
    public function setFormat($format) {
        $this->getDocument()->format = $format;
        return $this;
    }
    
    public function getRequired() {
        if(!property_exists($this->getDocument(), 'required')) {
            return null;
        }
        return $this->getDocument()->required;
    }
    
    public function setRequired($required) {
        $this->getDocument()->required = $required;
        return $this;
    }
    
    public function getMinimum() {
        if(!property_exists($this->getDocument(), 'minimum')) {
            return null;
        }
        return $this->getDocument()->minimum;
    }
    
    public function setMinimum($minimum) {
        $this->getDocument()->minimum = $minimum;
        return $this;
    }
    
    public function getMaximum() {
        if(!property_exists($this->getDocument(), 'maximum')) {
            return null;
        }
        return $this->getDocument()->maximum;
    }
    
    public function setMaximum($maximum) {
        $this->getDocument()->maximum = $maximum;
        return $this;
    }
    
    public function getEnum() {
        if(!property_exists($this->getDocument(), 'enum')) {
            return null;
        }
        return $this->getDocument()->enum;
    }
    
    public function setEnum($enum) {
        $this->getDocument()->enum = $enum;
        return $this;
    }
}
