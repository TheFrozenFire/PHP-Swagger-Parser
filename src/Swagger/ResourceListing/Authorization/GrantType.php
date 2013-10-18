<?php
namespace Swagger\ResourceListing\Authorization;

use Swagger\Document;
use InvalidArgumentException;

abstract class GrantType extends Document {
    public static function fromDocument($type, $document) {
        $className = static::grantTypeNameToClass($type);
        $className = "Swagger\ResourceListing\Authorization\GrantType\\{$type}";
        if(class_exists($className)) {
            return new $className($document);
        } else {
            throw new InvalidArgumentException("Grant type '{$type}' not implemented");
        }
    }
    
    protected static function grantTypeNameToClass($type) {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $type)));
    }
}
