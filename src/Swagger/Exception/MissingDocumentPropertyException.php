<?php
namespace Swagger\Exception;

class MissingDocumentPropertyException extends \UnexpectedValueException
{
    use AdditionalExceptionContextTrait;

    protected $message = 'Document property does not exist';

    public static function assess($document, $name)
    {
        if(!property_exists($document, $name)) {
            throw (new static)
                ->setDocumentProperty($name);
        }
    }
    
    public function setDocumentProperty($documentProperty)
    {
        $this->addAdditionalContext('Document Property', $documentProperty, 'Requested property name');
        return $this;
    }
}
