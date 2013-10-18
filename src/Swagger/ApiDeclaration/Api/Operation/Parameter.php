<?php
namespace Swagger\ApiDeclaration\Api\Operation;

use Swagger\Document;
use InvalidArgumentException;

class Parameter extends Document {
    public function getParamType() {
        return parent::getDocumentProperty('paramType');
    }
    
    public function setParamType($paramType) {
        return parent::setDocumentProperty('paramType', $paramType);
    }
    
    public function getName() {
        return parent::getDocumentProperty('name');
    }
    
    public function setName($name) {
        return parent::setDocumentProperty('name', $name);
    }
    
    public function getDescription() {
        return parent::getDocumentProperty('description');
    }
    
    public function setDescription($description) {
        return parent::setDocumentProperty('description', $description);
    }
    
    public function getDataType() {
        return parent::getDocumentProperty('dataType');
    }
    
    public function setDataType($dataType) {
        return parent::setDocumentProperty('dataType', $dataType);
    }
    
    public function getFormat() {
        return parent::getDocumentProperty('format');
    }
    
    public function setFormat($format) {
        return parent::setDocumentProperty('format', $format);
    }
    
    public function getRequired() {
        return parent::getDocumentProperty('required');
    }
    
    public function setRequired($required) {
        return parent::setDocumentProperty('required', $required);
    }
    
    public function getMinimum() {
        return parent::getDocumentProperty('minimum');
    }
    
    public function setMinimum($minimum) {
        return parent::setDocumentProperty('minimum', $minimum);
    }
    
    public function getMaximum() {
        return parent::getDocumentProperty('maximum');
    }
    
    public function setMaximum($maximum) {
        return parent::setDocumentProperty('maximum', $maximum);
    }
    
    public function getEnum() {
        return parent::getDocumentProperty('enum');
    }
    
    public function setEnum($enum) {
        return parent::setDocumentProperty('enum', $enum);
    }
}
