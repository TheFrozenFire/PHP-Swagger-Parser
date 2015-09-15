<?php
namespace Swagger\Object;

class SecurityRequirement extends AbstractObject
{
    use CollectionObjectTrait;

    public function getItem($key)
    {
        return $this->getRequirement($key);
    }
    
    public function getRequirement($name)
    {
        return $this->getDocumentProperty($name);
    }
    
    public function setRequirement($name, $requirement)
    {
        return $this->setDocumentProperty($name, $requirement);
    }
}
