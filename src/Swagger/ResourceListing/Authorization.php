<?php
namespace Swagger\ResourceListing;

use Swagger\Document;
use Swagger\ResourceListing\Authorization\GrantType;

class Authorization extends Document {
    protected $name;
    
    public function __construct($document = null, $name) {
        $this->setName($name);
        parent::__construct($document);
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
        return $this;
    }
    
    public function getType() {
        return parent::getDocumentProperty('type');
    }
    
    public function setType($type) {
        return parent::setDocumentProperty('type', $type);
    }
    
    public function getScopes() {
        return parent::getDocumentProperty('scopes');
    }
    
    public function setScopes($scopes) {
        return parent::setDocumentProperty('scopes', $scopes);
    }
    
    public function getGrantTypes() {
        return parent::getSubDocuments('grantTypes', array('Swagger\ResourceListing\Authorization\GrantType', 'fromDocument'), true);
    }
    
    public function setGrantTypes($grantTypes) {
        return parent::setSubDocuments('grantTypes', $grantTypes, 'Swagger\ResourceListing\Authorization\GrantType');
    }
    
    public function getKeyName() {
        return parent::getDocumentProperty('keyName');
    }
    
    public function setKeyName($keyName) {
        return parent::setDocumentProperty('keyName', $keyName);
    }
    
    public function getPassAs() {
        return parent::getDocumentProperty('passAs');
    }
    
    public function setPassAs($passAs) {
        return parent::setDocumentProperty('passAs', $passAs);
    }
}
