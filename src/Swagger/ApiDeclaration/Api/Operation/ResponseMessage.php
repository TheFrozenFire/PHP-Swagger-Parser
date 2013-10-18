<?php
namespace Swagger\ApiDeclaration\Api\Operation;

use Swagger\Document;
use InvalidArgumentException;

class ResponseMessage extends Document {
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
}
