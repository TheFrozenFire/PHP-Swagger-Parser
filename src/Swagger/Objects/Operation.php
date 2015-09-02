<?php
namespace Swagger\Object;

class Operation extends AbstractObject
{
    public function getTags()
    {
        return $this->getDocumentProperty('tags');
    }
    
    public function setTags($tags)
    {
        return $this->setDocumentProperty('tags', $tags);
    }
    
    public function getSummary()
    {
        return $this->getDocumentProperty('summary');
    }
    
    public function setSummary($summary)
    {
        return $this->setDocumentProperty('summary', $summary);
    }
    
    public function getDescription()
    {
        return $this->getDocumentProperty('description');
    }
    
    public function setDescription($description)
    {
        return $this->setDocumentProperty('description', $description);
    }
    
    public function getExternalDocs()
    {
        return $this->getDocumentObjectProperty('externalDocs', ExternalDocs::class);
    }
    
    public function setExternalDocs(ExternalDocs $externalDocs)
    {
        return $this->setDocumentObjectProperty('externalDocs', $externalDocs);
    }
    
    public function getOperationId()
    {
        return $this->getDocumentProperty('operationId');
    }
    
    public function setOperationId($operationId)
    {
        return $this->setDocumentProperty('operationId', $operationId);
    }
    
    public function getConsumes()
    {
        return $this->getDocumentProperty('consumes');
    }
    
    public function setConsumes($consumes)
    {
        return $this->setDocumentProperty('consumes', $consumes);
    }
    
    public function getProduces()
    {
        return $this->getDocumentProperty('produces');
    }
    
    public function setProduces($produces)
    {
        return $this->setDocumentProperty('produces', $produces);
    }
    
    public function getParameters()
    {
        return $this->getDocumentObjectProperty('parameters', Parameter::class, true);
    }
    
    public function setParameters($parameters)
    {
        return $this->setDocumentObjectProperty('parameters', $parameters);
    }
    
    public function getResponses()
    {
        return $this->getDocumentObjectProperty('responses', Responses::class);
    }
    
    public function setResponses(Responses $responses)
    {
        return $this->setDocumentObjectProperty('responses', $responses);
    }
    
    public function getSchemes()
    {
        return $this->getDocumentProperty('schemes');
    }
    
    public function setSchemes($schemes)
    {
        return $this->setDocumentProperty('schemes', $schemes);
    }
    
    public function getDeprecated()
    {
        return $this->getDocumentProperty('deprecated');
    }
    
    public function setDeprecated($deprecated)
    {
        return $this->setDocumentProperty('deprecated', $deprecated);
    }
    
    public function getSecurity()
    {
        return $this->getDocumentObjectProperty('security', Security::class);
    }
    
    public function setSecurity($security)
    {
        return $this->setDocumentObjectProperty('security', $security);
    }
}
