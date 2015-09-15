<?php
namespace Swagger\Object;

class ParametersDefinitions extends AbstractObject
{
    use CollectionObjectTrait;

    public function getItem($key)
    {
        return $this->getDefinition($key);
    }
    
    public function getDefinition($name)
    {
        return $this->getDocumentObjectProperty($name, Parameter::class);
    }
    
    public function setDefinition($name, Parameter $definition)
    {
        return $this->setDocumentObjectProperty($name, $definition);
    }
}
