<?php
namespace Swagger\Object;

class PathItem extends AbstractObject
{
    public function getRef()
    {
        return $this->getDocumentProperty('$ref');
    }
    
    public function setRef($ref)
    {
        return $this->setDocumentProperty('$ref', $ref);
    }
    
    public function getGet()
    {
        return $this->getDocumentObjectProperty('get', Operation::class);
    }
    
    public function setGet(Operation $get)
    {
        return $this->setDocumentObjectProperty('get', $get);
    }
    
    public function getPut()
    {
        return $this->getDocumentObjectProperty('put', Operation::class);
    }
    
    public function setPut(Operation $put)
    {
        return $this->setDocumentObjectProperty('put', $put);
    }
    
    public function getPost()
    {
        return $this->getDocumentObjectProperty('post', Operation::class);
    }
    
    public function setPost(Operation $post)
    {
        return $this->setDocumentObjectProperty('post', $post);
    }
    
    public function getDelete()
    {
        return $this->getDocumentObjectProperty('delete', Operation::class);
    }
    
    public function setDelete(Operation $delete)
    {
        return $this->setDocumentObjectProperty('delete', $delete);
    }
    
    public function getOptions()
    {
        return $this->getDocumentObjectProperty('options', Operation::class);
    }
    
    public function setOptions(Operation $options)
    {
        return $this->setDocumentObjectProperty('options', $options);
    }
    
    public function getHead()
    {
        return $this->getDocumentObjectProperty('head', Operation::class);
    }
    
    public function setHead(Operation $head)
    {
        return $this->setDocumentObjectProperty('head', $head);
    }
    
    public function getPatch()
    {
        return $this->getDocumentObjectProperty('patch', Operation::class);
    }
    
    public function setPatch(Operation $patch)
    {
        return $this->setDocumentObjectProperty('patch', $patch);
    }
    
    public function getParameters()
    {
        return $this->getDocumentObjectProperty('parameters', Parameter::class, true);
    }
    
    public function setParameters($parameters)
    {
        return $this->setDocumentObjectProperty('parameters', $parameters);
    }
}
