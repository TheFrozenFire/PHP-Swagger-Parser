<?php
namespace Swagger;

use InvalidArgumentException;
use stdClass;

abstract class Document {
    protected $document;
    
    public function __construct($document = null) {
        if(!is_null($document)) {
            $this->setDocument($document);
        }
    }
    
    public function getDocumentProperty($name) {
        if(!property_exists($this->getDocument(), $name)) {
            return null;
        }
        
        return $this->getDocument()->$name;
    }
    
    public function setDocumentProperty($name, $value) {
        $this->getDocument()->$name = $value;
        
        return $this;
    }
    
    public function getSubDocument($name, $factory) {
        $subDocument = $this->getDocumentProperty($name);
        $instance = $factory($subDocument);
        
        return $instance;
    }
    
    public function setSubDocument($name, $document, $className = null) {
        if(!is_null($className) && $document instanceof $className) {
            $document = $document->getDocument();
        }
        
        return $this->setDocumentProperty($name, $document);
    }
    
    public function getSubDocuments($name, $factory, $passIndex = false) {
        $documents = $this->getDocumentProperty($name);
        if(is_object($documents)) {
            $documents = $this->convertStdClassToAssociativeArray($documents);
        }
        if(is_array($documents)) {
            foreach($documents as $key => $document) {
                if($passIndex) {
                    $instance = $factory($key, $document);
                } else {
                    $instance = $factory($document);
                }
                $documents[$key] = $instance;
            }
        }
        
        return $documents;
    }
    
    public function setSubDocuments($name, $documents, $className = null) {
        if(!is_array($documents)) {
            throw new InvalidArgumentException('Parameter must be of type array');
        }
        
        if(!is_null($className)) {
            foreach($documents as $key => $document) {
                if($document instanceof $className) {
                    $documents[$key] = $document->getDocument();
                }
            }
        }
        
        return $this->setDocumentProperty($name, $documents);
    }
    
    public function getDocument() {
        if(!($this->document instanceof stdClass)) {
            $this->document = new stdClass;
        }
        return $this->document;
    }
    
    public function setDocument($document) {
        if(!($document instanceof stdClass)) {
            throw new InvalidArgumentException(
                'Document must be an stdClass'
            );
        }
        $this->document = $document;
        return $this;
    }

    /**
     * @param $documents
     * @return array
     */
    protected function convertStdClassToAssociativeArray($documents) {
        $return = array();
        foreach (get_object_vars($documents) as $key => $document) {
            $return[$key] = $document;
        }
        return $return;
    }
}
