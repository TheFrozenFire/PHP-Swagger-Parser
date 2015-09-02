<?php
namespace Swagger\Object;

abstract class Parameter extends AbstractObject
{
    public function getName()
    {
        return $this->getDocumentProperty('name');
    }
    
    public function setName($name)
    {
        return $this->setDocumentProperty('name', $name);
    }
    
    public function getIn()
    {
        return $this->getDocumentProperty('in');
    }
    
    public function setIn($in)
    {
        return $this->setDocumentProperty('in', $in);
    }
    
    public function getDescription()
    {
        return $this->getDocumentProperty('description');
    }
    
    public function setDescription($description)
    {
        return $this->setDocumentProperty('description', $description);
    }
    
    public function getRequired()
    {
        return $this->getDocumentProperty('required');
    }
    
    public function setRequired($required)
    {
        return $this->setDocumentProperty('required', $required);
    }
}
