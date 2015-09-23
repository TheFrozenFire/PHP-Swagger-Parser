<?php
namespace Swagger\Exception;

class InvalidOperationException extends \UnexpectedValueException
{
    use AdditionalExceptionContextTrait;
    
    protected $message = 'Operation by the specified ID does not exist';

    public static function assess($operations, $operationId)
    {
        if(!isset($operations[$operationId])) {
            throw (new static)
                ->setOperationId($operationId);
        }
    }
    
    public function setOperationId($operationId)
    {
        $this->addAdditionalContext('Operation ID', $operationId, 'Requested operation ID');
        return $this;
    }
}
