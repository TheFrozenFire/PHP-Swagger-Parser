<?php
namespace Swagger\Object;

class Header extends AbstractObject
{
    use ValueObjectTrait;

    public function getDescription()
    {
        return $this->getDocumentProperty('description');
    }
    
    public function setDescription($description)
    {
        return $this->setDocumentProperty('description', $description);
    }
}
