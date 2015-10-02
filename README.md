Swagger Parser
======
Parse Swagger specification documents programmatically, and also parse data
structures according to a specification.

## Installation

`composer require thefrozenfire/swagger:^2.0`

## License

* see [LICENSE](LICENSE.md) file

## Use

### Describe an Operation
```php
<?php
$spec = file_get_contents('http://petstore.swagger.io/v2/swagger.json');
$decodedSpec = json_decode($spec);

$document = new Swagger\Document($decodedSpec);

$operation = $document->getOperationById('addPet');
?>
Operation ID: <?=$operation->getOperationId()?> 
Tags: <?=implode(', ', $operation->getTags())?> 
Summary: <?=$operation->getSummary()?> 
Description: <?=$operation->getDescription()?> 
External Documentation: <?=$operation->getExternalDocs()?> 
```

### Parse a data structure
```php
<?php
$spec = file_get_contents('http://petstore.swagger.io/v2/swagger.json');
$decodedSpec = json_decode($spec);

$dataToParse = '...';

$document = new Swagger\Document($decodedSpec);
$schemaResolver = $document->getSchemaResolver();

$dataType = $document->getSchemaForOperationResponse(
    'getPetById',
    200
);

$schemaObject = $schemaResolver->parseType($dataType, $dataToParse);
?>
Pet name: <?=$schemaObject->getProperty('name')?>
Pet status: <?=$schemaObject->status?>
```
