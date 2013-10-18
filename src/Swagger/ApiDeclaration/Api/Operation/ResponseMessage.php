<?php
namespace Swagger\ApiDeclaration\Api\Operation;

use Swagger\Document;
use InvalidArgumentException;

class ResponseMessage extends Document {
    public function getCode() {
        return parent::getDocumentProperty('code');
    }
    
    public function setCode($code) {
        return parent::setDocumentProperty('code', $code);
    }
    
    public function getMessage() {
        return parent::getDocumentProperty('message');
    }
    
    public function setMessage($message) {
        return parent::setDocumentProperty('message', $message);
    }
    
    public function getResponseModel() {
        return parent::getDocumentProperty('responseModel');
    }
    
    public function setResponseModel($responseModel) {
        return parent::setDocumentProperty('responseModel', $responseModel);
    }
}
