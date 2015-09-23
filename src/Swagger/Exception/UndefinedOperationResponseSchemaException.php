<?php
namespace Swagger\Exception;

class UndefinedOperationResponseSchemaException extends \UnexpectedValueException
{
    use AdditionalExceptionContextTrait;
    
    protected $message = 'No schema can be found for the specified operation and status code combination';
    
    public function setOperationId($operationId)
    {
        $this->addAdditionalContext('Operation ID', $operationId, 'Requested operation ID');
        return $this;
    }
    
    public function setStatusCode($statusCode)
    {
        $this->addAdditionalContext('Status Code', $statusCode, 'Requested HTTP status code');
        return $this;
    }
}
