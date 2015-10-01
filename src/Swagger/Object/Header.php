<?php
namespace Swagger\Object;

class Header extends AbstractObject implements TypeObjectInterface
{
    use TypeObjectTrait;

    public function getDescription()
    {
        return $this->getDocumentProperty('description');
    }
    
    public function setDescription($description)
    {
        return $this->setDocumentProperty('description', $description);
    }
}
