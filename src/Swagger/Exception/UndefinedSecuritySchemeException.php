<?php
namespace Swagger\Exception;

class UndefinedSecuritySchemeException extends \DomainException
{
    use AdditionalExceptionContextTrait;
    
    protected $message = 'No security schemes of the specified type are defined on this API';
    
    public static function assess($type, $scheme)
    {
        if(empty($scheme)) {
            throw (new static)
                ->setSchemeType($type);
        }
    }
    
    public function setSchemeType($schemeType)
    {
        $this->addAdditionalContext('Scheme Type', $schemeType, 'Requested security scheme type');
        return $this;
    }
}
