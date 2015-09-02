<?php
namespace Swagger\Object;

class Xml extends AbstractObject
{
    public function getName()
    {
        return $this->getDocumentProperty('name');
    }
    
    public function setName($name)
    {
        return $this->setDocumentProperty('name', $name);
    }
    
    public function getNamespace()
    {
        return $this->getDocumentProperty('namespace');
    }
    
    public function setNamespace($namespace)
    {
        return $this->setDocumentProperty('namespace', $namespace);
    }
    
    public function getPrefix()
    {
        return $this->getDocumentProperty('prefix');
    }
    
    public function setPrefix($prefix)
    {
        return $this->setDocumentProperty('prefix', $prefix);
    }
    
    public function getAttribute()
    {
        return $this->getDocumentProperty('attribute');
    }
    
    public function setAttribute($attribute)
    {
        return $this->setDocumentProperty('attribute', $attribute);
    }
    
    public function getWrapped()
    {
        return $this->getDocumentProperty('wrapped');
    }
    
    public function setWrapped($wrapped)
    {
        return $this->setDocumentProperty('wrapped', $wrapped);
    }
}
