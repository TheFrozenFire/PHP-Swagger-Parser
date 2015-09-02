<?php
namespace Swagger;

use InvalidArgumentException;
use stdClass;

abstract class AbstractDocument
{
    protected $document;
    
    public function __construct($document = null) {
        if(!is_null($document)) {
            $this->setDocument($document);
        }
    }
    
    public function getDocumentProperty($name) {
        if(!property_exists($this->getDocument(), $name)) {
            return null;
        }
        
        return $this->getDocument()->$name;
    }
    
    public function setDocumentProperty($name, $value) {
        $this->getDocument()->$name = $value;
        
        return $this;
    }
    
    public function getDocumentObjectProperty($name, $swaggerObjectClass)
    {
        $value = $this->getDocumentProperty($name);
        
        if(is_array($value)) {
            $newValue = [];
            
            foreach($value as $arrayValue) {
                $newValue[] = new $objectClass($value);
            }
            
            return $newValue;
        } else {
            return new $objectClass($value);
        }
    }
    
    public function setDocumentObjectProperty($name, $object)
    {
        if(is_array($object)) {
            $value = [];
            
            foreach($object as $arrayObject) {
                $value[] = $object->getSwaggerObjectValue();
            }
        } else {
            $value = $object->getSwaggerObjectValue();
        }
        
        return $this->setDocumentProperty($name, $value);
    }
    
    public function getDocument() {
        if(!($this->document instanceof stdClass)) {
            $this->document = new stdClass;
        }
        return $this->document;
    }
    
    public function setDocument($document) {
        if(!($document instanceof stdClass)) {
            throw new InvalidArgumentException(
                'Document must be an stdClass'
            );
        }
        $this->document = $document;
        return $this;
    }
}
