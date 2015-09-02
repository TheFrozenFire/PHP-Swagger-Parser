<?php
namespace Swagger\Object;

class Scopes extends AbstractObject
{
    public function getScope($name)
    {
        return $this->getDocumentProperty($name);
    }
    
    public function setScope($name, $scope)
    {
        return $this->setDocumentProperty($name, $scope);
    }
}
