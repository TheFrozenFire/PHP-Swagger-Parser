<?php
namespace Swagger\Object;

use InvalidArgumentException;
use stdClass;

use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Filter;

abstract class AbstractObject implements ObjectInterface
{
    protected $document;
    
    protected $hydrator;    
    
    public function __construct($document = null) {
        if(!is_null($document)) {
            $this->setDocument($document);
        }
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
    
    public function getSwaggerObjectValue()
    {
        $objectValue = new stdClass;
        
        $attributes = $this->getHydrator()
            ->extract($this);
        
        foreach($attributes as $name => $value) {
            if($value instanceof ObjectInterface) {
                $value = $value->getSwaggerObjectValue();
            }
            
            $objectValue->$name $value;
        }
        
        return $objectValue;
    }
    
    public function __set($name, $value)
    {
        $hydrator = $this->getHydrator();
        $hydrator->hydrate(array(
            $name => $value,
            "{$name}s" => $value
        ), $this);
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
    
    public function getDocumentObjectProperty($name, $swaggerObjectClass, $allowsRef = false)
    {
        $value = $this->getDocumentProperty($name);
        
        if(is_array($value)) {
            $newValue = [];
            
            foreach($value as $arrayValue) {
                if($allowsRef && property_exists($arrayValue, '$ref')) {
                    $newValue[] = new Reference($arrayValue);
                } else {
                    $newValue[] = new $objectClass($arrayValue);
                }
            }
            
            return $newValue;
        } else {
            if($allowsRef && property_exists($arrayValue, '$ref')) {
                return new Reference($value);
            } else {
                return new $objectClass($value);
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

    public function getHydrator()
    {
        if (!$this->hydrator) {
            $hydrator = new ClassMethods;
            $hydrator->setUnderscoreSeparatedKeys(false);
            $hydrator->addFilter('getHydrator', new Filter\MethodMatchFilter('getHydrator'), Filter\FilterComposite::CONDITION_AND);
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
    }
    
    public function setHydrator($hydrator)
    {
        $this->hydrator = $hydrator;
        return $this;
    }
}
