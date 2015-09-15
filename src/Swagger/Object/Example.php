<?php
namespace Swagger\Object;

class Example extends AbstractObject
{
    use CollectionObjectTrait;

    public function getItem($key)
    {
        return $this->getExample($key);
    }

    public function getExample($mimeType)
    {
        return $this->getDocumentProperty($mimeType);
    }
    
    public function setExample($mimeType, $example)
    {
        return $this->setDocumentProperty($mimeType, $example);
    }
}
