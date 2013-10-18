<?php
namespace Swagger\ApiDeclaration\Model;

use Swagger\Document;
use InvalidArgumentException;

class Property extends Document {
    protected $name;
    
    public function __construct($document = null, $name) {
        $this->setName($name);
        parent::__construct($document);
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
        return $this;
    }
    
    public function getType() {
        if(!property_exists($this->getDocument(), 'type')) {
            return null;
        }
        return $this->getDocument()->type;
    }
    
    public function setType($type) {
        $this->getDocument()->type = $type;
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
