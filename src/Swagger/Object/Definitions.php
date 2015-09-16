<?php
namespace Swagger\Object;

class Definitions extends AbstractObject
{
    use CollectionObjectTrait;
    
    public function getItem($key)
    {
        return $this->getDefinition($key);
    }

    public function getDefinition($name)
    {
        return $this->getDocumentObjectProperty($name, Schema::class, false);
    }
    
    public function setDefinition($name, Schema $definition)
    {
        return $this->setDocumentObjectProperty($name, $definition);
    }
}
