<?php
namespace Swagger\ResourceListing;

use InvalidArgumentException;
use stdClass;

class Api {
    protected $document;
    
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
    
    public function getDocument() {
        if(!is_object($this->document)) {
            $this->document = new stdClass;
        }
        return $this->document;
    }
    
    public function setDocument($document) {
        if(!($document instanceof stdClass)) {
            throw new InvalidArgumentException(
                'Document must be an stdClass'
            );
        }
        $this->document = $document;
        return $this;
    }
}
