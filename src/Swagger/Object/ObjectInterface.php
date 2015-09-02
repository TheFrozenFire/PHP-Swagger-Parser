<?php
namespace Swagger\Object;

interface ObjectInterface
{
    public function __construct($value);
    
    public function getDocument();
    
    public function setDocument($document);
}
