<?php
namespace Swagger\Exception;

class MissingDocumentPropertyException extends \UnexpectedValueException
{
    protected $message = 'Document property does not exist';

    protected $documentProperty;

    public static function assess($document, $name)
    {
        if(!property_exists($document, $name)) {
            throw (new static)
                ->setDocumentProperty($name);
        }
    }
    
    public function getDocumentProperty()
    {
        return $this->documentProperty;
    }
    
    public function setDocumentProperty($documentProperty)
    {
        $this->documentProperty = $documentProperty;
        return $this;
    }
}
