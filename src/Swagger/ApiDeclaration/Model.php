<?php
namespace Swagger\ApiDeclaration\Model;

class Model {
    protected $document;
    
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
