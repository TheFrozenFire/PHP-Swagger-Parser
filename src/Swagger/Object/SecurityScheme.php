<?php
namespace Swagger\Object;

class SecurityScheme extends AbstractObject
{
    const TYPE_BASIC = 'basic';
    const TYPE_APIKEY = 'apiKey';
    const TYPE_OAUTH2 = 'oauth2';
    
    const IN_QUERY = 'query';
    const IN_HEADER = 'header';

    public function getType()
    {
        return $this->getDocumentProperty('type');
    }
    
    public function setType($type)
    {
        return $this->setDocumentProperty('type', $type);
    }
    
    public function getDescription()
    {
        return $this->getDocumentProperty('description');
    }
    
    public function setDescription($description)
    {
        return $this->setDocumentProperty('description', $description);
    }
    
    public function getName()
    {
        return $this->getDocumentProperty('name');
    }
    
    public function setName($name)
    {
        return $this->setDocumentProperty('name', $name);
    }
    
    public function getIn()
    {
        return $this->getDocumentProperty('in');
    }
    
    public function setIn($in)
    {
        return $this->setDocumentProperty('in', $in);
    }
    
    public function getFlow()
    {
        return $this->getDocumentProperty('flow');
    }
    
    public function setFlow($flow)
    {
        return $this->setDocumentProperty('flow', $flow);
    }
    
    public function getAuthorizationUrl()
    {
        return $this->getDocumentProperty('authorizationUrl');
    }
    
    public function setAuthorizationUrl($authorizationUrl)
    {
        return $this->setDocumentProperty('authorizationUrl', $authorizationUrl);
    }
    
    public function getTokenUrl()
    {
        return $this->getDocumentProperty('tokenUrl');
    }
    
    public function setTokenUrl($tokenUrl)
    {
        return $this->setDocumentProperty('tokenUrl', $tokenUrl);
    }
    
    public function getScopes()
    {
        return $this->getDocumentObjectProperty('scopes', Scopes::class);
    }
    
    public function setScopes(Scopes $scopes)
    {
        return $this->setDocumentObjectProperty('scopes', $scopes);
    }
}
