<?php
namespace Swagger\Json;

class Reference
{
    protected $specification;
    
    protected $parsed;

    public function __construct($specification)
    {
        $this->setSpecification($specification);
    }
    
    public function hasUri()
    {
        $parsed = $this->getParsed();
        
        return !empty($parsed['path']);
    }
    
    public function getUri()
    {
        $specification = $this->getSpecification();
        $parsed = $this->getParsed();
        $fragment = isset($parsed['fragment'])?$parsed['fragment']:'';
        
        // The specification minus the fragment
        return substr($specification, 0, -(strlen($fragment) + 1));
    }
    
    public function getFragment()
    {
        $parsed = $this->getParsed();
        
        return isset($parsed['fragment'])?$parsed['fragment']:'';
    }
    
    public function getPointer()
    {
        return new Pointer($this->getFragment());
    }
    
    protected function getParsed()
    {
        if(empty($this->parsed)) {
            $this->parsed = parse_url($this->getSpecification());
        }
    
        return $this->parsed;
    }
    
    public function getSpecification()
    {
        return $this->specification;
    }
    
    protected function setSpecification($specification)
    {
        $this->specification = $specification;
        return $this;
    }
}
