<?php
namespace Swagger\ResourceListing\Authorization\GrantType\Implicit;

use Swagger\Document;

class LoginEndpoint extends Document {
    public function getUrl() {
        return parent::getDocumentProperty('url');
    }
    
    public function setUrl($url) {
        return parent::setDocumentProperty('url', $url);
    }
}
