<?php
namespace Swagger\Object;

trait ValueObjectTrait
{
    public function getType()
    {
        return $this->getDocumentProperty('type');
    }
    
    public function setType($type)
    {
        return $this->setDocumentProperty('type', $type);
    }
    
    public function getFormat()
    {
        return $this->getDocumentProperty('format');
    }
    
    public function setFormat($format)
    {
        return $this->setDocumentProperty('format', $format);
    }
    
    public function getItems()
    {
        return $this->getDocumentObjectProperty('items', Items::class);
    }
    
    public function setItems(Items $items)
    {
        return $this->setDocumentObjectProperty('items', $items);
    }
    
    public function getCollectionFormat()
    {
        return $this->getDocumentProperty('collectionFormat');
    }
    
    public function setCollectionFormat($collectionFormat)
    {
        return $this->setDocumentProperty('collectionFormat', $collectionFormat);
    }
    
    public function getDefault()
    {
        return $this->getDocumentProperty('default');
    }
    
    public function setDefault($default)
    {
        return $this->setDocumentProperty('default', $default);
    }
    
    public function getMaximum()
    {
        return $this->getDocumentProperty('maximum');
    }
    
    public function setMaximum($maximum)
    {
        return $this->setDocumentProperty('maximum', $maximum);
    }
    
    public function getExclusiveMaximum()
    {
        return $this->getDocumentProperty('exclusiveMaximum');
    }
    
    public function setExclusiveMaximum($exclusiveMaximum)
    {
        return $this->setDocumentProperty('exclusiveMaximum', $exclusiveMaximum);
    }
    
    public function getMinimum()
    {
        return $this->getDocumentProperty('minimum');
    }
    
    public function setMinimum($minimum)
    {
        return $this->setDocumentProperty('minimum', $minimum);
    }
    
    public function getExclusiveMinimum()
    {
        return $this->getDocumentProperty('exclusiveMinimum');
    }
    
    public function setExclusiveMinimum($exclusiveMinimum)
    {
        return $this->setDocumentProperty('exclusiveMinimum', $exclusiveMinimum);
    }
    
    public function getMaxLength()
    {
        return $this->getDocumentProperty('maxLength');
    }
    
    public function setMaxLength($maxLength)
    {
        return $this->setDocumentProperty('maxLength', $maxLength);
    }
    
    public function getMinLength()
    {
        return $this->getDocumentProperty('minLength');
    }
    
    public function setMinLength($minLength)
    {
        return $this->setDocumentProperty('minLength', $minLength);
    }
    
    public function getPattern()
    {
        return $this->getDocumentProperty('pattern');
    }
    
    public function setPattern($pattern)
    {
        return $this->setDocumentProperty('pattern', $pattern);
    }
    
    public function getMaxItems()
    {
        return $this->getDocumentProperty('maxItems');
    }
    
    public function setMaxItems($maxItems)
    {
        return $this->setDocumentProperty('maxItems', $maxItems);
    }
    
    public function getMinItems()
    {
        return $this->getDocumentProperty('minItems');
    }
    
    public function setMinItems($minItems)
    {
        return $this->setDocumentProperty('minItems', $minItems);
    }
    
    public function getUniqueItems()
    {
        return $this->getDocumentProperty('uniqueItems');
    }
    
    public function setUniqueItems($uniqueItems)
    {
        return $this->setDocumentProperty('uniqueItems', $uniqueItems);
    }
    
    public function getEnum()
    {
        return $this->getDocumentProperty('enum');
    }
    
    public function setEnum($enum)
    {
        return $this->setDocumentProperty('enum', $enum);
    }
    
    public function getMultipleOf()
    {
        return $this->getDocumentProperty('multipleOf');
    }
    
    public function setMultipleOf($multipleOf)
    {
        return $this->setDocumentProperty('multipleOf', $multipleOf);
    }
}
