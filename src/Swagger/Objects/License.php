<?php
namespace Swagger\Object;

class License extends AbstractObject
{
    public function getName()
    {
        return $this->getDocumentProperty('name');
    }
    
    public function setName($name)
    {
        return $this->setDocumentProperty('name', $name);
    }
    
    public function getUrl()
    {
        return $this->getDocumentProperty('url');
    }
    
    public function setUrl($url)
    {
        return $this->setDocumentProperty('url', $url);
    }
}
