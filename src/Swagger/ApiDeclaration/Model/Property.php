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
        return parent::getDocumentProperty('type');
    }
    
    public function setType($type) {
        return parent::setDocumentProperty('type', $type);
    }
    
    public function getFormat() {
        return parent::getDocumentProperty('format');
    }
    
    public function setFormat($format) {
        return parent::setDocumentProperty('format', $format);
    }
    
    public function getDescription() {
        return parent::getDocumentProperty('description');
    }
    
    public function setDescription($description) {
        return parent::setDocumentProperty('description', $description);
    }
    
    public function getEnum() {
        return parent::getDocumentProperty('enum');
    }
    
    public function setEnum($enum) {
        return parent::setDocumentProperty('enum', $enum);
    }
}
