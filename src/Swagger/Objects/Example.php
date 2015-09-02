<?php
namespace Swagger\Object;

class Example extends AbstractObject
{
    public function getExample($mimeType)
    {
        return $this->getDocumentProperty($mimeType);
    }
    
    public function setExample($mimeType, $example)
    {
        return $this->setDocumentProperty($mimeType, $example);
    }
}
