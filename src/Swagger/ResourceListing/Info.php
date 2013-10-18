<?php
namespace Swagger\ResourceListing;

use Swagger\Document;

class Info extends Document {
    public function getTitle() {
        return parent::getDocumentProperty('title');
    }
    
    public function setTitle($title) {
        return parent::setDocumentProperty('title', $title);
    }
    
    public function getDescription() {
        return parent::getDocumentProperty('description');
    }
    
    public function setDescription($description) {
        return parent::setDocumentProperty('description', $description);
    }
    
    public function getTermsOfServiceUrl() {
        return parent::getDocumentProperty('termsOfServiceUrl');
    }
    
    public function setTermsOfServiceUrl($termsOfServiceUrl) {
        return parent::setDocumentProperty('termsOfServiceUrl', $termsOfServiceUrl);
    }
    
    public function getContact() {
        return parent::getDocumentProperty('contact');
    }
    
    public function setContact($contact) {
        return parent::setDocumentProperty('contact', $contact);
    }
    
    public function getLicense() {
        return parent::getDocumentProperty('license');
    }
    
    public function setLicense($license) {
        return parent::setDocumentProperty('license', $license);
    }
    
    public function getLicenseUrl() {
        return parent::getDocumentProperty('licenseUrl');
    }
    
    public function setLicenseUrl($licenseUrl) {
        return parent::setDocumentProperty('licenseUrl', $licenseUrl);
    }
}
