<?php
namespace Swagger\Object;

class SecurityDefinitions extends AbstractObject
{
    public function getAllDefinitions()
    {
        $definitions = array_keys(get_object_vars($this->getDocument()));
        
        return $definition;
    }

    public function getDefinition($name)
    {
        return $this->getDocumentObjectProperty($name, SecurityScheme::class);
    }
    
    public function setDefinition($name, SecurityScheme $definition)
    {
        return $this->setDocumentObjectProperty($name, $definition);
    }
}
