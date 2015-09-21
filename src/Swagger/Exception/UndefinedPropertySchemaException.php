<?php
namespace Swagger\Exception;

class UndefinedPropertySchemaException extends \UnexpectedValueException
{
    protected $message = 'Schema is not defined for property of schema';
    
    protected $propertyName;
    
    protected $schema;
    
    public function getPropertyName()
    {
        return $this->propertyName;
    }
    
    public function setPropertyName($propertyName)
    {
        $this->propertyName = $propertyName;
        return $this;
    }
    
    public function getSchema()
    {
        return $this->schema;
    }
    
    public function setSchema($schema)
    {
        $this->schema = $schema;
        return $this;
    }
}
