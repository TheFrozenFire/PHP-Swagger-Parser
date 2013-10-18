<?php
namespace Swagger\ResourceListing;

use Swagger\Document;
use InvalidArgumentException;

class Api extends Document {
    public function __construct($document = null) {
        if(!is_null($document)) {
            $this->setDocument($document);
        }
    }
    
    public function getPath() {
        return parent::getDocumentProperty('path');
    }
    
    public function setPath($path) {
        return parent::setDocumentProperty('path', $path);
    }
    
    public function getDescription() {
        return parent::getDocumentProperty('description');
    }
    
    public function setDescription($description) {
        return parent::setDocumentProperty('description', $description);
    }
}
