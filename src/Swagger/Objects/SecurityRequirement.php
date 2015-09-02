<?php
namespace Swagger\Object;

class SecurityRequirement extends AbstractObject
{
    public function getRequirement($name)
    {
        return $this->getDocumentProperty($name);
    }
    
    public function setRequirement($name, $requirement)
    {
        return $this->setDocumentProperty($name, $requirement);
    }
}
