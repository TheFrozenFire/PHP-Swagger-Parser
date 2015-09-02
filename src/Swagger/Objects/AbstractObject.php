<?php
namespace Swagger\Object;

use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Filter;

abstract class AbstractObject implements ObjectInterface
{
    protected $hydrator;
    
    public function __set($name, $value)
    {
        $hydrator = $this->getHydrator();
        $hydrator->hydrate(array(
            $name => $value,
            "{$name}s" => $value
        ), $this);
    }

    public function getHydrator()
    {
        if (!$this->hydrator) {
            $hydrator = new ClassMethods;
            $hydrator->setUnderscoreSeparatedKeys(false);
            $hydrator->addFilter('getHydrator', new Filter\MethodMatchFilter('getHydrator'), Filter\FilterComposite::CONDITION_AND);
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
    }
    
    public function setHydrator($hydrator)
    {
        $this->hydrator = $hydrator;
        return $this;
    }
}
