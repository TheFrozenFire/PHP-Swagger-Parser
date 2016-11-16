<?php
namespace Swagger\Json;

class Pointer
{
    protected $specification;
    
    protected $segments;
    
    protected static function unescape($value)
    {
        $value = str_replace('~1', '/', $value);
        $value = str_replace('~0', '~', $value);
        
        return $value;
    }

    public function __construct($specification)
    {
        $this->setSpecification($specification);
    }
    
    public function getSegment($index)
    {
        if(empty($this->segments)) {
            $this->segments = explode('/', trim($this->getSpecification(), '/'));
        }
        
        if(!isset($this->segments[$index])) {
            throw new \OutOfRangeException('Requested segment index is not defined');
        }
        
        return static::unescape($this->segments[$index]);
    }
    
    protected function getSpecification()
    {
        return $this->specification;
    }
    
    protected function setSpecification($specification)
    {
        $this->specification = $specification;
        return $this;
    }
}
