<?php
namespace Swagger\Object;

class Info extends AbstractObject
{
    public function getTitle()
    {
        return $this->getDocumentProperty('title');
    }
    
    public function setTitle($title)
    {
        return $this->setDocumentProperty('title', $title);
    }
    
    public function getDescription()
    {
        return $this->getDocumentProperty('description');
    }
    
    public function setDescription($description)
    {
        return $this->setDocumentProperty('description', $description);
    }
    
    public function getTermsOfService()
    {
        return $this->getDocumentProperty('termsOfService');
    }
    
    public function setTermsOfService($termsOfService)
    {
        return $this->setDocumentProperty('termsOfService', $termsOfService);
    }
    
    public function getContact()
    {
        return $this->getDocumentObjectProperty('contact', Contact::class);
    }
    
    public function setContact(Contact $contact)
    {
        return $this->setDocumentObjectProperty('contact', $contact);
    }
    
    public function getLicense()
    {
        return $this->getDocumentObjectProperty('license', License::class);
    }
    
    public function setLicense(License $license)
    {
        return $this->setDocumentProperty('license', $license);
    }
    
    public function getVersion()
    {
        return $this->getDocumentProperty('version');
    }
    
    public function setVersion($version)
    {
        return $this->setDocumentProperty('version', $version);
    }
}
