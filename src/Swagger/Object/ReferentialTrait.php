<?php
namespace Swagger\Object;

trait ReferentialTrait
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
