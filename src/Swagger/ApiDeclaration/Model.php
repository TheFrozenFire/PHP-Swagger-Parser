<?php
namespace Swagger\ApiDeclaration;

use Swagger\Document;
use Swagger\ApiDeclaration\Model\Property;
use InvalidArgumentException;

class Model extends Document {
    protected $name;
    
    public function __construct($document = null, $name) {
        $this->setName($name);
        parent::__construct($name);
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getId() {
        return parent::getDocumentProperty('id');
    }
    
    public function setId($id) {
        return parent::setDocumentProperty('id', $id);
    }
    
    public function getProperties() {
        return parent::getSubDocuments('properties', array(get_called_class(), 'propertyFromDocument'), true);
    }
    
    public function setProperties($properties) {
        return parent::setSubDocuments('properties', $properties, 'Swagger\ApiDeclaration\Model\Property');
    }
    
    public static function propertyFromDocument($name, $document) {
        return new Property($document, $name);
    }
}
