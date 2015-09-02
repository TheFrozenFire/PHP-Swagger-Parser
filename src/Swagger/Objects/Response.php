<?php
namespace Swagger\Object;

class Response extends AbstractObject
{
    public function getDescription()
    {
        return $this->getDocumentProperty('description');
    }
    
    public function setDescription($description)
    {
        return $this->setDocumentProperty('description', $description);
    }
    
    public function getSchema()
    {
        return $this->getDocumentObjectProperty('schema', Schema::class);
    }
    
    public function setSchema(Schema $schema)
    {
        return $this->setDocumentObjectProperty('schema', $schema);
    }
    
    public function getHeaders()
    {
        return $this->getDocumentObjectProperty('headers', Headers::class);
    }
    
    public function setHeaders(Headers $headers)
    {
        return $this->setDocumentObjectProperty('headers', $headers);
    }
    
    public function getExamples()
    {
        return $this->getDocumentObjectProperty('examples', Example::class);
    }
    
    public function setExamples(Example $examples)
    {
        return $this->setDocumentObjectProperty('examples', $examples);
    }
}
