<?php
namespace Swagger;

class OperationReference
{
    protected $operationId;

    protected $path;
    
    protected $pathItem;
    
    protected $method;
    
    protected $operation;
    
    public function __construct(
        $operationId,
        $path,
        Object\PathItem $pathItem,
        $method,
        Object\Operation $operation
    )
    {
        $this->setOperationId($operationId);
        $this->setPath($path);
        $this->setPathItem($pathItem);
        $this->setMethod($method);
        $this->setOperation($operation);
    }
    
    public function getOperationId()
    {
        return $this->operationId;
    }
    
    protected function setOperationId($operationId)
    {
        $this->operationId = $operationId;
        return $this;
    }
    
    public function getPath()
    {
        return $this->path;
    }
    
    protected function setPath($path)
    {
        $this->path = $path;
        return $this;
    }
    
    public function getPathItem()
    {
        return $this->pathItem;
    }
    
    protected function setPathItem($pathItem)
    {
        $this->pathItem = $pathItem;
        return $this;
    }
    
    public function getMethod()
    {
        return $this->method;
    }
    
    protected function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }
    
    public function getOperation()
    {
        return $this->operation;
    }
    
    protected function setOperation($operation)
    {
        $this->operation = $operation;
        return $this;
    }
}
