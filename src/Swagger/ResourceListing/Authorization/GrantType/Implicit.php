<?php
namespace Swagger\ResourceListing\Authorization\GrantType;

use Swagger\ResourceListing\Authorization\GrantType\Implicit\LoginEndpoint;

class Implicit extends GrantType {
    public function getLoginEndpoint() {
        return parent::getSubDocument('loginEndpoint', array(get_called_class(), 'loginEndpointFromDocument'));
    }
    
    public function setLoginEndpoint($loginEndpoint) {
        return parent::setSubDocument('loginEndpoint', $loginEndpoint, 'Swagger\ResourceListing\Authorization\GrantType\Implicit\LoginEndpoint');
    }
    
    public function getTokenName() {
        return parent::getDocumentProperty('tokenName');
    }
    
    public function setTokenName($tokenName) {
        return parent::setDocumentProperty('tokenName', $tokenName);
    }
    
    public static function loginEndpointFromDocument($document) {
        return new LoginEndpoint($document);
    }
}
