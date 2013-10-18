<?php
namespace Swagger\ResourceListing\Authorization\GrantType;

use Swagger\ResourceListing\Authorization\GrantType\AuthorizationCode\TokenRequestEndpoint;
use Swagger\ResourceListing\Authorization\GrantType\AuthorizationCode\TokenEndpoint;

class AuthorizationCode extends GrantType {
    public function getTokenRequestEndpoint() {
        return parent::getSubDocument('tokenRequestEndpoint', array(get_called_class(), 'tokenRequestEndpointFromDocument'));
    }
    
    public function setTokenRequestEndpoint($tokenRequestEndpoint) {
        return parent::setSubDocument('tokenRequestEndpoint', $tokenRequestEndpoint, 'Swagger\ResourceListing\Authorization\GrantType\AuthorizationCode\TokenRequestEndpoint');
    }
    
    public function getTokenEndpoint() {
        return parent::getSubDocument('tokenEndpoint', array(get_called_class(), 'tokenEndpointFromDocument'));
    }
    
    public function setTokenEndpoint($tokenEndpoint) {
        return parent::setSubDocument('tokenEndpoint', $tokenEndpoint, 'Swagger\ResourceListing\Authorization\GrantType\AuthorizationCode\TokenEndpoint');
    }
    
    public static function tokenRequestEndpointFromDocument($document) {
        return new TokenRequestEndpoint($document);
    }
    
    public static function tokenEndpointFromDocument($document) {
        return new TokenEndpoint($document);
    }
}
