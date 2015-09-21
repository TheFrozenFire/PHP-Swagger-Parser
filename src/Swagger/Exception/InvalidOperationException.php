<?php
namespace Swagger\Exception;

class InvalidOperationException extends \UnexpectedValueException
{
    protected $message = 'Operation by the specified ID does not exist';
    
    protected $operationId;

    public static function assess($operations, $operationId)
    {
        if(!isset($operations[$operationId])) {
            throw (new static)
                ->setOperationId($operationId);
        }
    }
    
    public function getOperationId()
    {
        return $this->operationId;
    }
    
    public function setOperationId($operationId)
    {
        $this->operationId = $operationId;
        return $this;
    }
}
