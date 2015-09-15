<?php
namespace Swagger\Object;

class SecurityDefinitions extends AbstractObject
{
    use CollectionObjectTrait;
    
    public function getItem($key)
    {
        return $this->getDefinition($key);
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
