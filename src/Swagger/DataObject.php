<?php
namespace Swagger;

class DataObject
{
    protected $type;
    
    protected $properties = [];
    
    public function __construct($type)
    {
        $this->setType($type);
    }
    
    public function getType()
    {
        return $this->type;
    }
    
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
    
    public function getProperties()
    {
        return $this->properties;
    }
    
    public function setProperties($properties)
    {
        $this->properties = $properties;
        return $this;
    }
    
    public function getProperty($name)
    {
        return $this->properties[$name];
    }
    
    public function setProperty($name, $value)
    {
        $this->properties[$name] = $value;
        return $this;
    }
    
    public function fromArray($properties)
    {
        foreach($properties as $name => $value) {
            $this->setProperty($name, $value);
        }
    }
    
    public function __get($name)
    {
        return $this->getProperty($name);
    }
    
    public function __set($name, $value)
    {
        $this->setProperty($name, $value);
    }
}
