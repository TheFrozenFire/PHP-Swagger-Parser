<?php
namespace Swagger\Object;

interface ReferentialInterface
{
    public function hasRef();

    public function getRef();
    
    public function setRef($ref);
}
