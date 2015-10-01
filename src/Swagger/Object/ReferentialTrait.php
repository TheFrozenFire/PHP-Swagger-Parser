<?php
namespace Swagger\Object;

trait ReferentialTrait
{
    public function hasRef()
    {
        return $this->hasDocumentProperty('$ref');
    }

    public function getRef()
    {
        return $this->getDocumentProperty('$ref');
    }
    
    public function setRef($ref)
    {
        return $this->setDocumentProperty('$ref', $ref);
    }
}
