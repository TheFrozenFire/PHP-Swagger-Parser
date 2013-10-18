<?php
namespace Swagger;

use Swagger\ResourceListing\Api;
use Swagger\ResourceListing\Authorization;

use InvalidArgumentException;
use stdClass;

class ResourceListing extends Document {
    public function __construct($document = null) {
        if(!is_null($document)) {
            $this->setDocument($document);
        }
    }
    
    public function produceApiUri(Api $api) {
        return $this->getBasePath().$api->getPath();
    }
    
    public function getApiVersion() {
        return parent::getDocumentProperty('apiVersion');
    }
    
    public function setApiVersion($apiVersion) {
        return parent::setDocumentProperty('apiVersion', $apiVersion);
    }
    
    public function getSwaggerVersion() {
        return parent::getDocumentProperty('swaggerVersion');
    }
    
    public function setSwaggerVersion($swaggerVersion) {
        return parent::setDocumentProperty('swaggerVersion', $swaggerVersion);
    }
    
    public function getDescription() {
        return parent::getDocumentProperty('description');
    }
    
    public function setDescription($description) {
        return parent::setDocumentProperty('description', $description);
    }
    
    public function getBasePath() {
        return parent::getDocumentProperty('basePath');
    }
    
    public function setBasePath($basePath) {
        return parent::setDocumentProperty('basePath', $basePath);
    }
    
    public function getApis() {
        return parent::getSubDocuments('apis', array(get_called_class(), 'apiFromDocument'));
    }
    
    public function setApis($apis) {
        return parent::setSubDocuments('apis', $apis, 'Swagger\ResourceListing\Api');
    }
    
    public function getAuthorizations() {
        return parent::getSubDocuments('authorizations', array(get_called_class(), 'authorizationFromDocument'), true);
    }
    
    public function setAuthorizations($authorizations) {
        return parent::setSubDocuments('authorizations', $authorizations, 'Swagger\ResourceListing\Api');
    }
    
    public function getInfo() {
        return $this->info;
    }
    
    public function setInfo($info) {
        $this->info = $info;
        return $this;
    }
    
    public function getDocument() {
        $document = parent::getDocument();
        if(!property_exists($document, 'apis')) {
            $document->apis = array();
        }
        return $document;
    }
    
    public function setDocument($document) {
        if(is_string($document)) {
            $document = json_decode($document);
        } elseif(!($document instanceof stdClass)) {
            throw new InvalidArgumentException(
                'Document must be a JSON string or the object representation of json_decode'
            );
        }
        return parent::setDocument($document);
    }
    
    public static function apiFromDocument($document) {
        return new Api($document);
    }
    
    public static function authorizationFromDocument($name, $document) {
        return new Authorization($document, $name);
    }
}
