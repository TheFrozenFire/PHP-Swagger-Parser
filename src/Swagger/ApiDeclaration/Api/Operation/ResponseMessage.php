<?php
namespace Swagger\ApiDeclaration\Api\Operation;

class ResponseMessage {
    protected $document;
    
    public function getCode() {
        if(!property_exists($this->getDocument(), 'code')) {
            return null;
        }
        return $this->getDocument()->code;
    }
    
    public function setCode($code) {
        $this->getDocument()->code = $code;
        return $this;
    }
    
    public function getMessage() {
        if(!property_exists($this->getDocument(), 'message')) {
            return null;
        }
        return $this->getDocument()->message;
    }
    
    public function setMessage($message) {
        $this->getDocument()->message = $message;
        return $this;
    }
    
    public function getResponseModel() {
        if(!property_exists($this->getDocument(), 'responseModel')) {
            return null;
        }
        return $this->getDocument()->responseModel;
    }
    
    public function setResponseModel($responseModel) {
        $this->getDocument()->responseModel = $responseModel;
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
