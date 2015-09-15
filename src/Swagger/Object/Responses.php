<?php
namespace Swagger\Object;

class Responses extends AbstractObject
{
    use CollectionObjectTrait;

    public function getItem($key)
    {
        return $this->getHttpStatusCode($key);
    }
    
    public function getIgnoredKeys()
    {
        return ['default'];
    }
    
    public function getDefault()
    {
        return $this->getDocumentObjectProperty('default', Response::class, true);
    }
    
    public function setDefault($default)
    {
        return $this->setDocumentObjectProperty('default', $default);
    }
    
    public function getHttpStatusCode($code)
    {
        return $this->getDocumentObjectProperty($code, Response::class, true);
    }
    
    public function setHttpStatusCode($code, $response)
    {
        return $this->setDocumentObjectProperty($code, $response);
    }
}
