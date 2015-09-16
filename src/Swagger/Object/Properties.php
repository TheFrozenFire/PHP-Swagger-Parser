<?php
namespace Swagger\Object;

class Properties extends AbstractObject
{
    use CollectionObjectTrait;
    
    public function getItem($name)
    {
        return $this->getProperty($name);
    }
    
    public function getProperty($name)
    {
        return $this->getDocumentObjectProperty($name, Items::class);
    }
    
    public function setProperty($name, Items $property)
    {
        return $this->setDocumentObjectProperty($name, $property);
    }
}
