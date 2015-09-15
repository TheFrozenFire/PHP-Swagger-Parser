<?php
namespace Swagger\Object;

class Scopes extends AbstractObject
{
    use CollectionObjectTrait;

    public function getItem($key)
    {
        return $this->getScope($key);
    }
    
    public function getScope($name)
    {
        return $this->getDocumentProperty($name);
    }
    
    public function setScope($name, $scope)
    {
        return $this->setDocumentProperty($name, $scope);
    }
}
