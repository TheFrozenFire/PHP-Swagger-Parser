<?php
namespace Swagger\ApiDeclaration\Api;

use Swagger\Document;
use Swagger\ApiDeclaration\Api\Operation\Parameter;
use Swagger\ApiDeclaration\Api\Operation\ResponseMessage;
use InvalidArgumentException;

class Operation extends Document {
    public function getMethod() {
        return parent::getDocumentProperty('method');
    }
    
    public function setMethod($method) {
        return parent::setDocumentProperty('method', $method);
    }
    
    public function getNickname() {
        return parent::getDocumentProperty('nickname');
    }
    
    public function setNickname($nickname) {
        return parent::setDocumentProperty('nickname', $nickname);
    }
    
    public function getType() {
        return parent::getDocumentProperty('type');
    }
    
    public function setType($type) {
        return parent::setDocumentProperty('type', $type);
    }
    
    public function getParameters() {
        return parent::getSubDocuments('parameters', array(get_called_class(), 'parameterFromDocument'));
    }
    
    public function setParameters($parameters) {
        return parent::setSubDocuments('parameters', $parameters, 'Swagger\ApiDeclaration\Api\Operation\Parameter');
    }
    
    public function getSummary() {
        return parent::getDocumentProperty('summary');
    }
    
    public function setSummary($summary) {
        return parent::setDocumentProperty('summary', $summary);
    }
    
    public function getNotes() {
        return parent::getDocumentProperty('notes');
    }
    
    public function setNotes($notes) {
        return parent::setDocumentProperty('notes', $notes);
    }

    public function getDeprecated() {
        return parent::getDocumentProperty('deprecated');
    }

    public function setDeprecated($deprecated) {
        return parent::setDocumentProperty('deprecated', $deprecated);
    }
    
    public function getErrorResponses() {
        return parent::getSubDocuments('errorResponses', array(get_called_class(), 'responseMessageFromDocument'));
    }
    
    public function setErrorResponses($errorResponses) {
        return parent::setSubDocuments('errorResponses', $errorResponses, 'Swagger\ApiDeclaration\Api\Operation\ResponseMessage');
    }
    
    public static function parameterFromDocument($document) {
        return new Parameter($document);
    }
    
    public static function responseMessageFromDocument($document) {
        return new ResponseMessage($document);
    }
}
