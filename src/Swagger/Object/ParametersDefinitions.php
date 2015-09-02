<?php
namespace Swagger\Object;

class ParametersDefinitions extends AbstractObject
{
    public function getDefinition($name)
    {
        return $this->getDocumentObjectProperty($name, Parameter::class);
    }
    
    public function setDefinition($name, Parameter $definition)
    {
        return $this->setDocumentObjectProperty($name, $definition);
    }
}
