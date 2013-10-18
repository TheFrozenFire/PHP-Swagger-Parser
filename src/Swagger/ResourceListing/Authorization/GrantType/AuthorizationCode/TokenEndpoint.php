<?php
namespace Swagger\ResourceListing\Authorization\GrantType\AuthorizationCode;

use Swagger\Document;

class TokenEndpoint extends Document {
    public function getUrl() {
        return parent::getDocumentProperty('url');
    }
    
    public function setUrl($url) {
        return parent::setDocumentProperty('url', $url);
    }
    
    public function getTokenName() {
        return parent::getDocumentProperty('tokenName');
    }
    
    public function setTokenName($tokenName) {
        return parent::setDocumentProperty('tokenName', $tokenName);
    }
}
