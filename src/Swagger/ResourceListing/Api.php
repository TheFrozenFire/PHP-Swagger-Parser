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
        if(!property_exists($this->getDocument(), 'path')) {
            return null;
        }
        return $this->getDocument()->path;
    }
    
    public function setPath($path) {
        $this->getDocument()->path = $path;
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
}
