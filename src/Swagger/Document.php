<?php
namespace Swagger;

use Swagger\Object as SwaggerObject;

class Document extends SwaggerObject\AbstractObject
{
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
