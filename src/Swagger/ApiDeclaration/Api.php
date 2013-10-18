<?php
namespace Swagger\ApiDeclaration;

use Swagger\ResourceListing\Api as ResourceListingApi;
use Swagger\ApiDeclaration\Api\Operation;

class Api extends ResourceListingApi {
    public function getOperations() {
        if(!property_exists($this->getDocument(), 'operations')) {
            $this->getDocument()->operations = array();
        }
        
        $operations = array();
        foreach($this->getDocument()->operations as $document) {
            $operations[] = static::operationFromDocument($document);
        }
        
        return $operations;
    }
    
    public function setOperations($operations) {
        if(!is_array($operations)) {
            throw new InvalidArgumentException('Parameter must be of type array');
        }
        
        foreach($operations as $key => $operation) {
            if($operation instanceof Operation) {
                $operations[$key] = $operation->getDocument();
            }
        }
        
        $this->getDocument()->operations = $operations;
        return $this;
    }
}
