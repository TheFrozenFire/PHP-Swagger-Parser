<?php
namespace Swagger\ResourceListing\Authorization\GrantType\AuthorizationCode;

use Swagger\Document;

class TokenRequestEndpoint extends Document {
    public function getUrl() {
        return parent::getDocumentProperty('url');
    }
    
    public function setUrl($url) {
        return parent::setDocumentProperty('url', $url);
    }
    
    public function getClientIdName() {
        return parent::getDocumentProperty('clientIdName');
    }
    
    public function setClientIdName($clientIdName) {
        return parent::setDocumentProperty('clientIdName', $clientIdName);
    }
    
    public function getClientSecretName() {
        return parent::getDocumentProperty('clientSecretName');
    }
    
    public function setClientSecretName($clientSecretName) {
        return parent::setDocumentProperty('clientSecretName', $clientSecretName);
    }
}
