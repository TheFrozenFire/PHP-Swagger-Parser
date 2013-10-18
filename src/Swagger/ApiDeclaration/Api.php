<?php
namespace Swagger\ApiDeclaration;

use Swagger\ResourceListing\Api as ResourceListingApi;
use Swagger\ApiDeclaration\Api\Operation;

use InvalidArgumentException;

class Api extends ResourceListingApi {
    public function getOperations() {
        return parent::getSubDocuments('operations', array(get_called_class(), 'operationFromDocument'));
    }
    
    public function setOperations($operations) {
        return parent::setSubDocuments('operations', $operations, 'Swagger\ApiDeclaration\Api\Operation');
    }
    
    public static function operationFromDocument($document) {
        return new Operation($document);
    }
}
