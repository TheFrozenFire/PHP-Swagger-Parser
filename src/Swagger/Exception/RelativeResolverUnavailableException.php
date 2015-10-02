<?php
namespace Swagger\Exception;

class RelativeResolverUnavailableException extends \UnexpectedValueException
{
    use AdditionalExceptionContextTrait;

    protected $message = 'Relative resolver is unavailable for the specified path';
    
    public function setUri($uri)
    {
        $this->addAdditionalContext('URI', $uri, 'Relative specification URI');
        return $this;
    }
}
