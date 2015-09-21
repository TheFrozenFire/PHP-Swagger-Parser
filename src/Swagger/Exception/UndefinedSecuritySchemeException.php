<?php
namespace Swagger\Exception;

class UndefinedSecuritySchemeException extends \DomainException
{
    protected $message = 'No security schemes of the specified type are defined on this API';
    
    protected $schemeType;
    
    public static function assess($type, $scheme)
    {
        if(empty($scheme)) {
            throw (new static)
                ->setSchemeType($type);
        }
    }
    
    public function getSchemeType()
    {
        return $this->schemeType;
    }
    
    public function setSchemeType($schemeType)
    {
        $this->schemeType = $schemeType;
        return $this;
    }
}
