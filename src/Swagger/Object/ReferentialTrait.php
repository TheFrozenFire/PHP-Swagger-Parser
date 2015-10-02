<?php
namespace Swagger\Object;

use Swagger\Json;

trait ReferentialTrait
{
    public function hasRef()
    {
        return $this->hasDocumentProperty('$ref');
    }

    public function getRef()
    {
        return $this->getDocumentObjectProperty('$ref', Json\Reference::class);
    }
    
    public function setRef($ref)
    {
        if($ref instanceof Json\Reference) {
            $ref = $ref->getSpecification();
        }
    
        return $this->setDocumentProperty('$ref', $ref);
    }
}
