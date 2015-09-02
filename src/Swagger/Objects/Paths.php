<?php
namespace Swagger\Object;

class Paths extends AbstractObject
{
    public function getPath($path)
    {
        return $this->getDocumentObjectProperty($path, PathItem::class);
    }
    
    public function setPath($path, PathItem $pathItem)
    {
        return $this->setDocumentProperty($path, $pathItem);
    }
}
