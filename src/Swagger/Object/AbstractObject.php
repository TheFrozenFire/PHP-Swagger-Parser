<?php
namespace Swagger\Object;

use Swagger\Exception as SwaggerException;
use stdClass;

abstract class AbstractObject implements ObjectInterface
{
    protected $document;
    
    public function __construct($document) {
        $this->setDocument($document);
    }
    
    public function getVendorExtension($extension, $class = null)
    {
        if(is_string($class)) {
            return $this->getDocumentObjectProperty("x-{$extension}", $class);
        } else {
            return $this->getDocumentProperty("x-{$extension}");
        }
    }
    
    public function setVendorExtension($extension, $value)
    {
        if($value instanceof SwaggerObject\ObjectInterface || (is_array($value) && reset($value) instanceof SwaggerObject\ObjectInterface)) {
            return $this->setDocumentObjectProperty("x-{$extension}", $value);
        } else {
            return $this->setDocumentProperty("x-{$extension}", $value);
        }
    }
    
    public function getDocument() {
        if(!($this->document instanceof stdClass)) {
            $this->document = new stdClass;
        }
        return $this->document;
    }
    
    public function setDocument($document) {
        SwaggerException\InvalidSourceDocumentException::assess($document);
        
        $this->document = $document;
        return $this;
    }
    
    public function getDocumentProperty($name) {
        SwaggerException\MissingDocumentPropertyException::assess($this->getDocument(), $name);
        
        return $this->getDocument()->$name;
    }
    
    public function setDocumentProperty($name, $value) {
        $this->getDocument()->$name = $value;
        
        return $this;
    }
    
    public function getDocumentObjectProperty($name, $swaggerObjectClass, $allowsRef = false)
    {
        $value = $this->getDocumentProperty($name);
        
        if(is_array($value)) {
            $newValue = [];
            
            foreach($value as $key => $arrayValue) {
                if($allowsRef && property_exists($arrayValue, '$ref')) {
                    $newValue[$key] = new Reference($arrayValue);
                } else {
                    $newValue[$key] = new $swaggerObjectClass($arrayValue);
                }
            }
            
            return $newValue;
        } else {
            if($allowsRef && $value instanceof stdClass && property_exists($value, '$ref')) {
                return new Reference($value);
            } else {
                return new $swaggerObjectClass($value);
            }
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
}
