<?php
namespace Swagger\Exception;

class InvalidSourceDocumentException extends \InvalidArgumentException
{
    use AdditionalExceptionContextTrait;
    
    protected $message = 'Document must be an stdClass';

    public static function assess($sourceDocument)
    {
        if(!($sourceDocument instanceof \stdClass)) {
            throw (new static)
                ->setSourceDocument($sourceDocument);
        }
    }
    
    public function setSourceDocument($sourceDocument)
    {
        $this->addAdditionalContext('Source Document', $sourceDocument, 'Provided source document');
        return $this;
    }
}
