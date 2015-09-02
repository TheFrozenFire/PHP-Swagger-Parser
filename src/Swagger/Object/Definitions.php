<?php
namespace Swagger\Object;

class Definitions extends AbstractObject
{
    public function getDefinition($name)
    {
        return $this->getDocumentObjectProperty($name, Schema::class);
    }
    
    public function setDefinition($name, Schema $definition)
    {
        return $this->setDocumentObjectProperty($name, $definition);
    }
}
