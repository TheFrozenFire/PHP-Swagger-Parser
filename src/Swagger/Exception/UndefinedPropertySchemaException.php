<?php
namespace Swagger\Exception;

class UndefinedPropertySchemaException extends \UnexpectedValueException
{
    use AdditionalExceptionContextTrait;
    
    protected $message = 'Schema is not defined for property of schema';
    
    public function setPropertyName($propertyName)
    {
        $this->addAdditionalContext('Property Name', $propertyName, 'Requested property name');
        return $this;
    }
    
    public function setSchema($schema)
    {
        $this->addAdditionalContext('Schema', $schema, 'Schema to retrieve property information from');
        return $this;
    }
}
