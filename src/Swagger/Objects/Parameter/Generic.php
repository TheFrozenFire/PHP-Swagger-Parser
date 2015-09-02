<?php
namespace Swagger\Object\Parameter;

use Swagger\Object\Items;
use Swagger\Object\ValueObjectTrait;
use Swagger\Object\Parameter as AbstractParameter;

abstract class Generic extends AbstractParameter
{
    use ValueObjectTrait;
    
    public function getAllowEmptyValue()
    {
        return $this->getDocumentProperty('allowEmptyValue');
    }
    
    public function setAllowEmptyValue($allowEmptyValue)
    {
        return $this->setDocumentProperty('allowEmptyValue', $allowEmptyValue);
    }
}
