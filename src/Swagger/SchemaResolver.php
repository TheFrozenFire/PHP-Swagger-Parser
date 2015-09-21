<?php
namespace Swagger;

use Swagger\Exception as SwaggerException;

class SchemaResolver
{
    protected $document;
    
    protected $strict = true;
    
    public function __construct(Document $document)
    {
        $this->setDocument($document);
    }
    
    public function parseDataObject($type, \stdClass $data)
    {
        $dataObject = new DataObject($type);
        if(is_string($type)) {
            $schema = $this->findSchemaForType($type);
        } elseif($type instanceof Object\Schema) {
            $schema = $type;
        } else {
            throw new \InvalidArgumentException('$type parameter must be a definition name or Schema object');
        }
        
        foreach(array_keys(get_object_vars($data)) as $propertyKey) {
            $propertyValue = $data->$propertyKey;
            try {
                $propertySchema = $this->findSchemaForProperty($schema, $propertyKey, true);
            } catch(SwaggerException\MissingDocumentPropertyException $e) {
                throw (new SwaggerException\UndefinedPropertySchemaException)
                    ->setPropertyName($propertyKey)
                    ->setSchema($schema);
            }
            
            if($propertySchema instanceof Object\Items) {
                $propertyValue = $this->parseDataArray($propertySchema, $propertyValue);
            
                // TODO: Constrain primitives
                $dataObject->setProperty($propertyKey, $propertyValue);
            } elseif($propertySchema instanceof Object\Schema) {
                $propertyObject = $this->parseDataObject($propertySchema, $propertyValue);
                
                $dataObject->setProperty($propertyKey, $propertyObject);
            } else {
                throw new \UnexpectedValueException('Property schema is not of type Items or Schema');
            }
        }
        
        return $dataObject;
    }
    
    protected function parseDataArray(Object\Items $schema, $data)
    {
        if($schema->getType() === 'array') {
            $arrayItemSchema = $schema->getItems();
            if($arrayItemSchema instanceof ReferentialInterface) {
                $arrayItemSchema = $this->resolveReference($arrayItemSchema);
            }
            foreach($data as $key => $value) {
                if($arrayItemSchema instanceof Object\Items) {
                    if($arrayItemSchema->getType() === 'array') {
                        // Holy nested arrays, Batman!
                        $data[$key] = $this->parseDataArray($arrayItemSchema, $value);
                    }
                } elseif($arrayItemSchema instanceof Object\Schema) {
                    $data[$key] = $this->parseDataObject($arrayItemSchema, $value);
                } else {
                    throw new \UnexpectedValueException('Array item schema is not of type Items or Schema');
                }
            }
        }
        
        return $data;
    }
    
    public function findSchemaForType($type)
    {
        $schema = $this->getDocument()
            ->getDefinitions()
            ->getDefinition($type);
        
        return $schema;
    }
    
    public function findSchemaForProperty(Object\Schema $schema, $property, $resolve = true)
    {
        $properties = $schema->getProperties();
        
        $propertySchema = $properties->getProperty($property);
        
        if($resolve && $propertySchema instanceof Object\Reference) {
            $propertySchema = $this->resolveReference($propertySchema);
        }
        
        return $propertySchema;
    }
    
    public function resolveReference(Object\ReferentialInterface $reference)
    {
        $ref = $reference->getRef();
    
        if(substr($ref, 0, strlen('#/definitions/')) !== '#/definitions/') {
            throw new \LogicException('Relative schemas are not yet supported');
        }
    
        $schemaName = substr($ref, strlen('#/definitions/'));
        
        return $this->findSchemaForType($schemaName);
    }
    
    protected function getDocument()
    {
        return $this->document;
    }
    
    protected function setDocument($document)
    {
        $this->document = $document;
        return $this;
    }
    
    public function getStrict()
    {
        return $this->strict;
    }
    
    public function setStrict($strict)
    {
        $this->strict = $strict;
        return $this;
    }
}
