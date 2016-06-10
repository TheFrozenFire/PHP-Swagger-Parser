<?php
namespace Swagger;

use Swagger\Exception as SwaggerException;

class SchemaResolver
{
    protected $document;
    
    protected $relativeResolvers;
    
    /**
     * Construct a new schema resolver
     *
     * @param Document $document - The underlying schema document
     * @param array $relativeResolvers - An array of relative resolvers or types
     */
    public function __construct(
        Document $document,
        $relativeResolvers = []
    )
    {
        $this->setDocument($document);
        $this->setRelativeResolvers($relativeResolvers);
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
    
    public function findTypeAtPointer(Json\Pointer $pointer)
    {
        switch($pointer->getSegment(0)) {
            case 'paths':
                return $this->getDocument()
                    ->getPaths()
                    ->getPath($pointer->getSegment(1));
            case 'definitions':
                return $this->getDocument()
                    ->getDefinitions()
                    ->getDefinition($pointer->getSegment(1));
            case 'parameters':
                return $this->getDocument()
                    ->getParameters()
                    ->getParameter($pointer->getSegment(1));
            case 'responses':
                return $this->getDocument()
                    ->getResponses()
                    ->getHttpStatusCode($pointer->getSegment(1));
            case 'securityDefinitions':
                return $this->getDocument()
                    ->getSecurityDefinitions()
                    ->getDefinition($pointer->getSegment(1));
            default:
                throw new \OutOfBoundsException('The specified type path is not supported');
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
    
        if($reference->hasUri()) {
            $uri = $reference->getUri();
            if(!$this->hasRelativeResolver($uri)) {
                throw (new SwaggerException\RelativeResolverUnavailableException)
                    ->setUri($uri);
            }
            
            $resolver = $this->getRelativeResolver($uri);
            
            if($resolver instanceof Object\AbstractObject) {
                return $resolver;
            } elseif(!($resolver instanceof SchemaResolver)) {
                throw new \UnexpectedValueException('Relative resolvers much be a SchemaResolver or a resolved type');
            }
        } else {
            $resolver = $this;
        }
        
        return $resolver->findTypeAtPointer($reference->getPointer());
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
    
    protected function setRelativeResolvers($relativeResolvers)
    {
        $this->relativeResolvers = $relativeResolvers;
        return $this;
    }
    
    protected function hasRelativeResolver($path)
    {
        return !empty($this->relativeResolvers[$path]);
    }
    
    protected function getRelativeResolver($path)
    {
        return $this->relativeResolvers[$path];
    }
}
