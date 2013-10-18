<?php
namespace Swagger;

use Swagger\ApiDeclaration\Api;

class ApiDeclaration extends ResourceListing {
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
    
    public function getResourcePath() {
        if(!property_exists($this->getDocument(), 'resourcePath')) {
            return null;
        }
        return $this->getDocument()->resourcePath;
    }
    
    public function setResourcePath($resourcePath) {
        $this->getDocument()->resourcePath = $resourcePath;
        return $this;
    }
    
    public function getModels() {
        if(!property_exists($this->getDocument(), 'models')) {
            $this->getDocument()->models = array();
        }
        
        $models = array();
        foreach($this->getDocument()->models as $document) {
            $models[] = static::modelFromDocument($document);
        }
        
        return $models;
    }
    
    public function setModels($models) {
        if(!is_array($models)) {
            throw new InvalidArgumentException('Parameter must be of type array');
        }
        
        foreach($models as $key => $model) {
            if($model instanceof Model) {
                $models[$key] = $model->getDocument();
            }
        }
        
        $this->getDocument()->models = $models;
        return $this;
    }
    
    protected static function apiFromDocument($document) {
        return new Api($document);
    }
    
    protected static function modelFromDocument($document) {
        return new Model($document);
    }
}
