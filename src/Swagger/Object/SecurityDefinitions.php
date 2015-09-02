<?php
namespace Swagger\Object;

class SecurityDefinitions extends AbstractObject
{
    public function getDefinition($name)
    {
        return $this->getDocumentObjectProperty($name, SecurityScheme::class);
    }
    
    public function setDefinition($name, SecurityScheme $definition)
    {
        return $this->setDocumentObjectProperty($name, $definition);
    }
}
