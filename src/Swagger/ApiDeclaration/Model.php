<?php
namespace Swagger\ApiDeclaration\Model;

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
        if(!property_exists($this->getDocument(), 'id')) {
            return null;
        }
        return $this->getDocument()->id;
    }
    
    public function setId($id) {
        $this->getDocument()->id = $id;
        return $this;
    }
    
    public function getProperties() {
        if(!property_exists($this->getDocument(), 'properties')) {
            $this->getDocument()->properties = array();
        }
        
        $properties = array();
        foreach($this->getDocument()->properties as $name => $property) {
            $properties[] = static::propertyFromDocument($name, $document);
        }
        
        return $properties;
    }
    
    public function setProperties($properties) {
        if(!is_array($properties)) {
            throw new InvalidArgumentException('Parameter must be of type array');
        }
        
        foreach($properties as $key => $property) {
            if($property instanceof Property) {
                $properties[$property->getName()] = $property->getDocument();
            }
        }
        
        $this->getDocument()->properties = $properties;
        return $this;
    }
    
    protected static function propertyFromDocument($name, $document) {
        return new Property($document, $name);
    }
}
