<?php
namespace Swagger\Object;

class Reference extends AbstractObject
{
    public function getRef()
    {
        return $this->getDocumentProperty('$ref');
    }
    
    public function setRef($ref)
    {
        return $this->setDocumentProperty('$ref', $ref);
    }
}
