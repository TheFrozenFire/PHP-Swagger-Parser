<?php
namespace Swagger;

use Swagger\ResourceListing\Api;

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
        if(!property_exists($this->getDocument(), 'apiVersion')) {
            return null;
        }
        
        return $this->getDocument()->apiVersion;
    }
    
    public function setApiVersion($apiVersion) {
        $this->getDocument()->apiVersion = $apiVersion;
        
        return $this;
    }
    
    public function getSwaggerVersion() {
        if(!property_exists($this->getDocument(), 'swaggerVersion')) {
            return null;
        }
        
        return $this->getDocument()->swaggerVersion;
    }
    
    public function setSwaggerVersion($swaggerVersion) {
        $this->getDocument()->swaggerVersion = $swaggerVersion;
        return $this;
    }
    
    public function getDescription() {
        if(!property_exists($this->getDocument(), 'description')) {
            return null;
        }
        
        return $this->getDocument()->description;
    }
    
    public function setDescription($description) {
        $this->getDocument()->description = $description;
        return $this;
    }
    
    public function getBasePath() {
        if(!property_exists($this->getDocument(), 'basePath')) {
            return null;
        }
        return $this->getDocument()->basePath;
    }
    
    public function setBasePath($basePath) {
        $this->getDocument()->basePath = $basePath;
        return $this;
    }
    
    public function getApis() {
        if(!property_exists($this->getDocument(), 'apis')) {
            $this->getDocument()->apis = array();
        }
        
        $apis = array();
        foreach($this->getDocument()->apis as $document) {
            $apis[] = static::apiFromDocument($document);
        }
        
        return $apis;
    }
    
    public function setApis($apis) {
        if(!is_array($apis)) {
            throw new InvalidArgumentException('Parameter must be of type array');
        }
        
        foreach($apis as $key => $api) {
            if($api instanceof Api) {
                $apis[$key] = $api->getDocument();
            }
        }
        
        $this->getDocument()->apis = $apis;
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
    
    protected static function apiFromDocument($document) {
        return new Api($document);
    }
}
