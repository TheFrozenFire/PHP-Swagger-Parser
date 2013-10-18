<?php
namespace Swagger\ApiDeclaration\Api;

use Swagger\Document;
use Swagger\ApiDeclaration\Api\Operation\Parameter;
use Swagger\ApiDeclaration\Api\Operation\ResponseMessage;
use InvalidArgumentException;

class Operation extends Document {
    public function getMethod() {
        if(!property_exists($this->getDocument(), 'method')) {
            return null;
        }
        return $this->getDocument()->method;
    }
    
    public function setMethod($method) {
        $this->getDocument()->method = $method;
        return $this;
    }
    
    public function getNickname() {
        if(!property_exists($this->getDocument(), 'nickname')) {
            return null;
        }
        return $this->getDocument()->nickname;
    }
    
    public function setNickname($nickname) {
        $this->getDocument()->nickname = $nickname;
        return $this;
    }
    
    public function getType() {
        if(!property_exists($this->getDocument(), 'type')) {
            return null;
        }
        return $this->getDocument()->type;
    }
    
    public function setType($type) {
        $this->getDocument()->type = $type;
        return $this;
    }
    
    public function getParameters() {
        if(!property_exists($this->getDocument(), 'parameters')) {
            $this->getDocument()->parameters = array();
        }
        
        $parameters = array();
        foreach($this->getDocument()->parameters as $parameter) {
            $parameters[] = static::parameterFromDocument($document);
        }
        
        return $parameters;
    }
    
    public function setParameters($parameters) {
        if(!is_array($parameters)) {
            throw new InvalidArgumentException('Parameter must be of type array');
        }
        
        foreach($parameters as $key => $parameter) {
            if($parameter instanceof Parameter) {
                $parameters[$key] = $parameter->getDocument();
            }
        }
        
        $this->getDocument()->parameters = $parameters;
        return $this;
    }
    
    public function getSummary() {
        if(!property_exists($this->getDocument(), 'summary')) {
            return null;
        }
        return $this->getDocument()->summary;
    }
    
    public function setSummary($summary) {
        $this->getDocument()->summary = $summary;
        return $this;
    }
    
    public function getNotes() {
        if(!property_exists($this->getDocument(), 'notes')) {
            return null;
        }
        return $this->getDocument()->notes;
    }
    
    public function setNotes($notes) {
        $this->getDocument()->notes = $notes;
        return $this;
    }
    
    public function getErrorResponses() {
        if(!property_exists($this->getDocument(), 'errorResponses')) {
            $this->getDocument()->errorResponses = array();
        }
        
        $errorResponses = array();
        foreach($this->getDocument()->errorResponses as $errorResponse) {
            $errorResponses[] = static::ResponseMessageFromDocument($document);
        }
        
        return $errorResponses;
    }
    
    public function setErrorResponses($errorResponses) {
        if(!is_array($errorResponses)) {
            throw new InvalidArgumentException('Parameter must be of type array');
        }
        
        foreach($errorResponses as $key => $errorResponse) {
            if($errorResponse instanceof ResponseMessage) {
                $errorResponses[$key] = $errorResponse->getDocument();
            }
        }
        
        $this->getDocument()->errorResponses = $errorResponses;
        return $this;
    }
    
    protected static function parameterFromDocument($document) {
        return new Parameter($document);
    }
    
    protected static function responseMessageFromDocument($document) {
        return new ResponseMessage($document);
    }
}
