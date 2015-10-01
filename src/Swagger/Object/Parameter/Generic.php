<?php
namespace Swagger\Object\Parameter;

use Swagger\Object\Items;
use Swagger\Object\TypeObjectTrait;
use Swagger\Object\TypeObjectInterface;
use Swagger\Object\Parameter as AbstractParameter;

abstract class Generic extends AbstractParameter implements TypeObjectInterface
{
    use TypeObjectTrait;
    
    public function getAllowEmptyValue()
    {
        return $this->getDocumentProperty('allowEmptyValue');
    }
    
    public function setAllowEmptyValue($allowEmptyValue)
    {
        return $this->setDocumentProperty('allowEmptyValue', $allowEmptyValue);
    }
}
