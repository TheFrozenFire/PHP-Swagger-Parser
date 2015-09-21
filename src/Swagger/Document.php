<?php
namespace Swagger;

use Swagger\Object as SwaggerObject;
use Swagger\Exception as SwaggerException;

class Document extends SwaggerObject\AbstractObject
{
    protected $defaultScheme;

    protected $operationsById = [];
    
    protected $schemaResolver;

    public function getOperationsById($reset = false)
    {
        if($reset) {
            $this->operationsById = [];
        }
        
        if(empty($this->operationsById)) {
            $paths = $this->getPaths();
            foreach($paths->getAll() as $path => $pathItem) {
                foreach([
                    [$pathItem, 'getGet'],
                    [$pathItem, 'getPut'],
                    [$pathItem, 'getPost'],
                    [$pathItem, 'getDelete'],
                    [$pathItem, 'getOptions'],
                    [$pathItem, 'getHead'],
                    [$pathItem, 'getPatch'],
                ] as $operationMethod) {
                    try {
                        $operation = $operationMethod();
                        
                        if($operation instanceof SwaggerObject\Operation) {
                            $operationKey = strtolower($operation->getOperationId());
                        
                            $this->operationsById[$operationKey] = new OperationReference(
                                $operation->getOperationId(),
                                $path,
                                $pathItem,
                                strtoupper(substr($operationMethod[1], 3)),
                                $operation
                            );
                        }
                    } catch(SwaggerException\MissingDocumentPropertyException $e) {
                        // That's okay. Not every method is implemented.
                    }
                }
            }
        }
        
        return $this->operationsById;
    }
    
    public function getOperationById($operationId, $reset = false)
    {
        $operations = $this->getOperationsById($reset);
        $operationId = strtolower($operationId);
        
        SwaggerException\InvalidOperationException::assess($operations, $operationId);
        
        return $operations[$operationId];
    }
    
    public function getSecuritySchemeOfType($type)
    {
        $securityDefinitions = $this->getSecurityDefinitions();
        $schemes = $securityDefinitions->getAll();
        $schemeOfType = null;
        
        foreach($schemes as $name => $scheme) {
            if($scheme->getType() === $type) {
                $schemeOfType = $scheme;
                break;
            }
        }
        
        SwaggerException\UndefinedSecuritySchemeException::assess($type, $schemeOfType);
        
        return $schemeOfType;
    }
    
    public function getSchemaForOperationResponse(
        $operationId,
        $statusCode
    )
    {
        $operation = $this->getOperationById($operationId);
        try {
            $response = $operation->getOperation()
                ->getResponses()
                ->getHttpStatusCode($statusCode);
        } catch(SwaggerException\MissingDocumentPropertyException $e) {
            // This status is not defined, but we can hope for an operation default
            try {
                $response = $operation->getOperation()
                    ->getResponses()
                    ->getDefault();
            } catch(SwaggerException\MissingDocumentPropertyException $e) {
                throw (new SwaggerException\UndefinedOperationResponseSchemaException)
                    ->setOperationId($operationId)
                    ->setStatusCode($statusCode);
            }
        }
        
        $schema = $this->getSchemaResolver()
            ->resolveReference($response->getSchema());
        
        return $schema;
    }
    
    public function getDefaultScheme()
    {
        if(!$this->defaultScheme) {
            $schemes = $this->getSchemes();
            $defaultScheme = reset($schemes);
            
            if($defaultScheme) {
                $this->defaultScheme = $defaultScheme;
            }
        }
    
        return $this->defaultScheme;
    }
    
    public function setDefaultScheme($defaultScheme)
    {
        $this->defaultScheme = $defaultScheme;
        return $this;
    }
    
    public function getSchemaResolver()
    {
        if(!$this->schemaResolver) {
            $this->schemaResolver = new SchemaResolver($this);
        }
    
        return $this->schemaResolver;
    }
    
    public function setSchemaResolver($schemaResolver)
    {
        $this->schemaResolver = $schemaResolver;
        return $this;
    }

    public function getSwagger()
    {
        return $this->getDocumentProperty('swagger');
    }
    
    public function setSwagger($version)
    {
        return $this->setDocumentProperty('swagger', $version);
    }
    
    public function getInfo()
    {
        $info = $this->getDocumentObjectProperty('info', SwaggerObject\Info::class);
        
        return $info;
    }
    
    public function setInfo(SwaggerObject\Info $info)
    {
        return $this->setDocumentObjectProperty('info', $info);
    }
    
    public function getHost()
    {
        return $this->getDocumentProperty('host');
    }
    
    public function setHost($host)
    {
        return $this->setDocumentProperty('host', $host);
    }
    
    public function getBasePath()
    {
        return $this->getDocumentProperty('basePath');
    }
    
    public function setBasePath($basePath)
    {
        return $this->setDocumentProperty('basePath', $basePath);
    }
    
    public function getSchemes()
    {
        return $this->getDocumentProperty('schemes');
    }
    
    public function setSchemes($schemes)
    {
        return $this->setDocumentProperty('schemes', $schemes);
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
    
    public function getPaths()
    {
        return $this->getDocumentObjectProperty('paths', SwaggerObject\Paths::class);
    }
    
    public function setPaths(SwaggerObject\Paths $paths)
    {
        return $this->setDocumentObjectProperty('paths', $paths);
    }
    
    public function getDefinitions()
    {
        return $this->getDocumentObjectProperty('definitions', SwaggerObject\Definitions::class);
    }
    
    public function setDefinitions(SwaggerObject\Definitions $definitions)
    {
        return $this->setDocumentObjectProperty('definitions', $definitions);
    }
    
    public function getParameters()
    {
        return $this->getDocumentObjectProperty('parameters', SwaggerObject\ParametersDefinitions::class);
    }
    
    public function setParameters(SwaggerObject\Parameters $parameters)
    {
        return $this->setDocumentObjectProperty('parameters', $parameters);
    }
    
    public function getResponses()
    {
        return $this->getDocumentObjectProperty('responses', SwaggerObject\Responses::class);
    }
    
    public function setResponses(SwaggerObject\Responses $responses)
    {
        return $this->setDocumentObjectProperty('responses', $responses);
    }
    
    public function getSecurityDefinitions()
    {
        return $this->getDocumentObjectProperty('securityDefinitions', SwaggerObject\SecurityDefinitions::class);
    }
    
    public function setSecurityDefinitions(SwaggerObject\SecurityDefinitions $securityDefinitions)
    {
        return $this->setDocumentObjetProperty('securityDefinitions', $securityDefinitions);
    }
    
    public function getSecurity()
    {
        return $this->getDocumentObjectProperty('security', SwaggerObject\SecurityDefinitions::class);
    }
    
    public function setSecurity($security)
    {
        return $this->setDocumentObjectProperty('security', $security);
    }
    
    public function getTags()
    {
        return $this->getDocumentObjectProperty('tags', SwaggerObject\Tags::class);
    }
    
    public function setTags($tags)
    {
        return $this->setDocumentObjectProperty('tags', $tags);
    }
    
    public function getExternalDocs()
    {
        return $this->getDocumentObjectProperty('externalDocs', SwaggerObject\ExternalDocs::class);
    }
    
    public function setExternalDocs(SwaggerObject\ExternalDocs $externalDocs)
    {
        return $this->setDocumentObjectProperty('externalDocs', $externalDocs);
    }
}
