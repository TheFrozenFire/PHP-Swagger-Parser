<?php
namespace Swagger\Object;

interface ObjectInterface
{
    public function __construct($value);

    public function getSwaggerObjectValue();
}
