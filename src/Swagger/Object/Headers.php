<?php
namespace Swagger\Object;

class Headers extends AbstractObject
{
    use CollectionObjectTrait;
    
    public function getItem($key)
    {
        return $this->getHeader($key);
    }

    public function getHeader($name)
    {
        return $this->getDocumentObjectProperty($name, Header::class);
    }
    
    public function setHeader($name, Header $header)
    {
        return $this->setDocumentObjectProperty($name, $header);
    }
}
