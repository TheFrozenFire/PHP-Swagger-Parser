<?php
namespace Swagger;

use Swagger\Exception as SwaggerException;

class SchemaResolver
{
    protected $document;
    
    public function __construct(Document $document)
    {
        $this->setDocument($document);
    }
    
    /**
     * Parse a type-object with data into its respective structure
     *
     * @param Object\TypeObjectInterface $type - The schema for the type
     * @param \stdClass $data - The input data
     * @return SchemaObject|array
     */
    public function parseType(Object\TypeObjectInterface $type, $data)
    {
        if($type instanceof Object\Items) {
            return $this->parseItemsObject($type, $data);
        } elseif($type instanceof Object\Schema) {
            return $this->parseSchemaObject($type, $data);
        } else {
            return $data;
        }
    }
    
    /**
     * Parse data into a SchemaObject as defined by a Schema
     *
     * @param Object\Schema $schema
     * @param \stdClass $data
     * @return SchemaObject
     */
    protected function parseSchemaObject(Object\Schema $schema, \stdClass $data)
    {
        $schemaObject = new SchemaObject($schema->getType());
        
        foreach(array_keys(get_object_vars($data)) as $propertyKey) {
            try {
                $propertySchema = $this->findSchemaForProperty($schema, $propertyKey);
            } catch(SwaggerException\MissingDocumentPropertyException $e) {
                throw (new SwaggerException\UndefinedPropertySchemaException)
                    ->setPropertyName($name)
                    ->setSchema($schema);
            }
        
            $propertyValue = $this->parseType(
                $propertySchema,
                $data->$propertyKey
            );
            
            $schemaObject->setProperty($propertyKey, $propertyValue);
        }
        
        return $schemaObject;
    }
    
    /**
     * Parse an array as defined by an Items object
     *
     * @param Object\Items $items
     * @param array $data
     * @return array
     */
    protected function parseItemsObject(Object\Items $items, $data)
    {
        if($items->getType() == 'array') {
            $arrayItems = $items->getItems();
            foreach($data as $key => $value) {
                $data[$key] = $this->parseItemsObject($arrayItems, $value);
            }
        }
        
        return $data;
    }
    
    protected function findSchemaForType($type)
    {
        $schema = $this->getDocument()
            ->getDefinitions()
            ->getDefinition($type);
        
        return $schema;
    }
    
    protected function findSchemaForProperty(Object\Schema $schema, $property)
    {
        try {
            $propertySchema = $schema->getProperties()
                ->getProperty($property);
        } catch(SwaggerException\MissingDocumentPropertyException $e) {
            try {
                $propertySchema = $this->findPropertyInAllOf($schema, $property);
            } catch(SwaggerException\MissingDocumentPropertyException $e) {
                $propertySchema = $this->findPropertyInAdditionalProperties($schema, $property);
            }
        }
        
        $propertySchema = $this->resolveReference($propertySchema);
        
        return $propertySchema;
    }
    
    protected function findPropertyInAllOf(Object\Schema $schema, $property)
    {
        $composingSchemas = $schema->getAllOf();
                
        foreach($composingSchemas as $composingSchema) {
            $composingSchema = $this->resolveReference($composingSchema);
            
            try {
                $propertySchema = $this->findSchemaForProperty($composingSchema, $property);
            } catch(SwaggerException\MissingDocumentPropertyException $e) {
                // This one doesn't have it, but let's try the rest
            }
        }
        
        if(empty($propertySchema)) {
            throw (new SwaggerException\MissingDocumentPropertyException)
                ->setDocumentProperty($property);
        }
        
        return $propertySchema;
    }
    
    protected function findPropertyInAdditionalProperties(Object\Schema $schema, $property)
    {
        $additionalProperties = $this->resolveReference(
            $schema->getAdditionalProperties()
        );
        
        $propertySchema = $this->findSchemaForProperty($additionalProperties, $property);
        
        return $propertySchema;
    }
    
    protected function resolveReference(Object\ReferentialInterface $reference)
    {
        if(!$reference->hasRef()) {
            return $reference;
        }
    
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
}
