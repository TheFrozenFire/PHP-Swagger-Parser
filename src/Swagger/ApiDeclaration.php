<?php
namespace Swagger;

use Swagger\ApiDeclaration\Api;
use InvalidArgumentException;

class ApiDeclaration extends ResourceListing {    
    public function getResourcePath() {
        return parent::getDocumentProperty('resourcePath');
    }
    
    public function setResourcePath($resourcePath) {
        return parent::setDocumentProperty('resourcePath', $resourcePath);
    }
    
    public function getModels() {
        return parent::getSubDocuments('models', array(get_called_class(), 'modelFromDocument'), true);
    }
    
    public function setModels($models) {
        return parent::setSubDocuments('models', $models, 'Swagger\ApiDeclaration\Model');
    }
    
    public static function modelFromDocument($name, $document) {
        return new Model($document, $name);
    }
}
