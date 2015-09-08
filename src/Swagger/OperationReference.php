<?php
namespace Swagger;

class OperationReference
{
    protected $path;
    
    protected $pathItem;
    
    protected $method;
    
    protected $operation;
    
    public function __construct(
        $path,
        Object\PathItem $pathItem,
        $method,
        Object\Operation $operation
    )
    {
        $this->setPath($path);
        $this->setPathItem($pathItem);
        $this->setMethod($method);
        $this->setOperation($operation);
    }
    
    protected function getPath()
    {
        return $this->path;
    }
    
    protected function setPath($path)
    {
        $this->path = $path;
        return $this;
    }
    
    protected function getPathItem()
    {
        return $this->pathItem;
    }
    
    protected function setPathItem($pathItem)
    {
        $this->pathItem = $pathItem;
        return $this;
    }
    
    protected function getMethod()
    {
        return $this->method;
    }
    
    protected function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }
    
    protected function getOperation()
    {
        return $this->operation;
    }
    
    protected function setOperation($operation)
    {
        $this->operation = $operation;
        return $this;
    }
}
