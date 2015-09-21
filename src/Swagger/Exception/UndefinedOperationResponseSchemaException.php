<?php
namespace Swagger\Exception;

class UndefinedOperationResponseSchemaException extends \UnexpectedValueException
{
    protected $message = 'No schema can be found for the specified operation and status code combination';

    protected $operationId;
    
    protected $statusCode;
    
    public function getOperationId()
    {
        return $this->operationId;
    }
    
    public function setOperationId($operationId)
    {
        $this->operationId = $operationId;
        return $this;
    }
    
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }
}
