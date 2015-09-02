<?php
namespace Swagger\Object\Parameter;

use Swagger\Object\Parameter as AbstractParameter;

class Body extends AbstractParameter
{
    public function getSchema()
    {
        return $this->getDocumentObjectProperty('schema', Schema::class);
    }
    
    public function setSchema(Schema $schema)
    {
        return $this->setDocumentProperty('schema', $schema);
    }
}
