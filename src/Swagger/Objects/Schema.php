<?php
namespace Swagger\Object;

class Schema extends AbstractObject
{
    use ValueObjectTrait;
    
    public function getDescription()
    {
        return $this->getDocumentProperty('description');
    }
    
    public function setDescription($description)
    {
        return $this->setDocumentProperty('description', $description);
    }
    
    public function getRef()
    {
        return $this->getDocumentProperty('$ref');
    }
    
    public function setRef($ref)
    {
        return $this->setDocumentProperty('$ref', $ref);
    }
    
    public function getItems()
    {
        return $this->getDocumentProperty('items');
    }
    
    public function setItems($items)
    {
        return $this->setDocumentProperty('items', $items);
    }
    
    public function getAllOf()
    {
        return $this->getDocumentProperty('allOf');
    }
    
    public function setAllOf($allOf)
    {
        return $this->setDocumentProperty('allOf', $allOf);
    }
    
    public function getProperties()
    {
        return $this->getDocumentProperty('properties');
    }
    
    public function setProperties($properties)
    {
        return $this->setDocumentProperty('properties', $properties);
    }
    
    public function getAdditionalProperties()
    {
        return $this->getDocumentProperty('additionalProperties');
    }
    
    public function setAdditionalProperties($additionalProperties)
    {
        return $this->setDocumentProperty('additionalProperties', $additionalProperties);
    }
    
    public function getDiscriminator()
    {
        return $this->getDocumentProperty('discriminator');
    }
    
    public function setDiscriminator($discriminator)
    {
        return $this->setDocumentProperty('discriminator', $discriminator);
    }
    
    public function getReadOnly()
    {
        return $this->getDocumentProperty('readOnly');
    }
    
    public function setReadOnly($readOnly)
    {
        return $this->setDocumentProperty('readOnly', $readOnly);
    }
    
    public function getXml()
    {
        return $this->getDocumentObjectProperty('xml', Xml::class);
    }
    
    public function setXml(Xml $xml)
    {
        return $this->setDocumentObjectProperty('xml', $xml);
    }
    
    public function getExternalDocs()
    {
        return $this->getDocumentObjectProperty('externalDocs', ExternalDocs::class);
    }
    
    public function setExternalDocs(ExternalDocs $externalDocs)
    {
        return $this->setDocumentObjectProperty('externalDocs', $externalDocs);
    }
    
    public function getExample()
    {
        return $this->getDocumentProperty('example');
    }
    
    public function setExample($example)
    {
        return $this->setDocumentProperty('example', $example);
    }
}
