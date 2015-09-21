<?php
namespace Swagger\Exception;

class InvalidSourceDocumentException extends \InvalidArgumentException
{
    protected $message = 'Document must be an stdClass';
    
    protected $sourceDocument;

    public static function assess($sourceDocument)
    {
        if(!($sourceDocument instanceof \stdClass)) {
            throw (new static)
                ->setSourceDocument($sourceDocument);
        }
    }
    
    public function getSourceDocument()
    {
        return $this->sourceDocument;
    }
    
    public function setSourceDocument($sourceDocument)
    {
        $this->sourceDocument = $sourceDocument;
        return $this;
    }
}
