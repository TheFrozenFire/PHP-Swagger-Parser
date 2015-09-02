<?php
namespace Swagger\Object;

class ExternalDocs extends AbstractObject
{
    public function getDescription()
    {
        return $this->getDocumentProperty('description');
    }
    
    public function setDescription($description)
    {
        return $this->setDocumentProperty('description', $description);
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
