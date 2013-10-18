<?php
namespace Swagger;

use InvalidArgumentException;
use stdClass;

abstract class Document {
    protected $document;
    
    public function __construct($document = null) {
        if(!is_null($document)) {
            $this->setDocument($document);
        }
    }
    
    public function getDocument() {
        if(!($this->document instanceof stdClass)) {
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
