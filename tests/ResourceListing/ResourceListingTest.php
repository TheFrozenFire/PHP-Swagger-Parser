<?php
namespace Swagger;

use PHPUnit_Framework_TestCase as TestCase;
use stdClass;

class ResourceListingTest extends TestCase {
    /**
     * Test the constructor
     *
     * @dataProvider provideResourceListingDocument
     * 
     * @param string $document
     *     A JSON string
     */
    public function testConstructor($document) {
        $resourceListing = new ResourceListing($document);
        $this->assertInstanceOf('Swagger\ResourceListing', $resourceListing);
    }
    
    /**
     * Test the API version getter
     * 
     * @dataProvider provideResourceListing
     *
     * @param Swagger\ResourceListing $resourceListing
     */
    public function testGetApiVersion($resourceListing) {
        $apiVersion = $resourceListing->getApiVersion();
        $this->assertTrue(is_string($apiVersion) || is_numeric($apiVersion));
    }
    
    /**
     * Test the API version setter
     */
    public function testSetApiVersion() {
        $resourceListing = new ResourceListing;
        
        $resourceListing->setApiVersion('0.1');
        $this->assertEquals('0.1', $resourceListing->getApiVersion());
        
        $resourceListing->setApiVersion(1.2);
        $this->assertEquals(1.2, $resourceListing->getApiVersion());
        
        $resourceListing->setApiVersion('v1.2-3');
        $this->assertEquals('v1.2-3', $resourceListing->getApiVersion());
    }
    
    /**
     * Test the Swagger version getter
     * 
     * @dataProvider provideResourceListing
     *
     * @param Swagger\ResourceListing $resourceListing
     */
    public function testGetSwaggerVersion($resourceListing) {
        $swaggerVersion = $resourceListing->getSwaggerVersion();
        $this->assertTrue(is_string($swaggerVersion) || is_numeric($swaggerVersion));
    }
    
    /**
     * Test the Swagger version setter
     */
    public function testSetSwaggerVersion() {
        $resourceListing = new ResourceListing;
        
        $resourceListing->setSwaggerVersion('0.1');
        $this->assertEquals('0.1', $resourceListing->getSwaggerVersion());
        
        $resourceListing->setSwaggerVersion(1.2);
        $this->assertEquals(1.2, $resourceListing->getSwaggerVersion());
        
        $resourceListing->setSwaggerVersion('v1.2-3');
        $this->assertEquals('v1.2-3', $resourceListing->getSwaggerVersion());
    }
    
    /**
     * Test the description getter
     * 
     * @dataProvider provideResourceListing
     *
     * @param Swagger\ResourceListing $resourceListing
     */
    public function testGetDescription($resourceListing) {
        $description = $resourceListing->getDescription();
        $this->assertTrue(is_null($description) || is_string($description));
    }
    
    /**
     * Test description setter
     */
    public function testSetDescription() {
        $resourceListing = new ResourceListing;
        
        $resourceListing->setDescription('test');
        $this->assertEquals('test', $resourceListing->getDescription());
    }
    
    /**
     * Test the apis getter
     * 
     * @dataProvider provideResourceListing
     *
     * @param Swagger\ResourceListing $resourceListing
     */
    public function testGetApis($resourceListing) {
        $apis = $resourceListing->getApis();
        $this->assertTrue(is_array($apis));
    }
    
    /**
     * Test apis setter
     */
    public function testSetApis() {
        $resourceListing = new ResourceListing;
        
        $this->assertEquals(array(), $resourceListing->getApis());
        
        $resourceListing->setApis(array($a = new stdClass, $b = new stdClass, $c = new stdClass));
        foreach($resourceListing->getApis() as $api) {
            $this->assertInstanceOf('Swagger\ResourceListing\Api', $api);
        }
        
        $resourceListing->setApis(array());
        $this->assertEquals(array(), $resourceListing->getApis());
    }
    
    /**
     * Test that the apis setter is constrained to arrays
     *
     * @expectedException InvalidArgumentException
     * @dataProvider provideInvalidApisValues
     * 
     * @param mixed $value
     */
    public function testSetApisConstraint($value) {
        $resourceListing = new ResourceListing;
        
        $resourceListing->setApis($value);
    }
    
    /**
     * Test the document getter
     * 
     * @dataProvider provideResourceListing
     *
     * @param Swagger\ResourceListing $resourceListing
     */
    public function testGetDocument($resourceListing) {
        $document = $resourceListing->getDocument();
        
        $this->assertInstanceOf('stdClass', $document);
    }
    
    /**
     * Test the document setter
     * 
     * @dataProvider provideDocumentContents
     * 
     * @param string $document
     */
    public function testSetDocument($document) {
        $resourceListing = new ResourceListing;
        
        $resourceListing->setDocument($document);
        $this->assertInstanceOf('stdClass', $resourceListing->getDocument());
    }
    
    /**
     * Test the document setter is constrained to strings and arrays
     * 
     * @expectedException InvalidArgumentException
     * @dataProvider provideInvalidDocuments
     * 
     * @param mixed $document
     */
    public function testSetDocumentConstraint($document) {
        $resourceListing = new ResourceListing;
        
        $resourceListing->setDocument($document);
    }
    
    public function provideResourceListingDocument() {
        $data = array();
        
        foreach(glob(__DIR__.'/fixtures/resourcelisting*.json') as $filename) {
            $data[] = array(
                file_get_contents($filename)
            );
        }
        
        return $data;
    }
    
    public function provideResourceListing() {
        $documents = $this->provideResourceListingDocument();
        
        $data = array();
        
        foreach($documents as $document) {
            $data[] = array(
                new ResourceListing($document[0])
            );
        }
        
        return $data;
    }
    
    public function provideInvalidApisValues() {
        return array(
            array(null),
            array(1),
            array('test'),
            array(new \SplStack)
        );
    }
    
    public function provideDocumentContents() {
        return array(
            array('{}'),
            array(new stdClass)
        );
    }
    
    public function provideInvalidDocuments() {
        return array(
            array(array()),
            array(array('')),
            array(array('apiVersion' => '0.1')),
            array(null),
        );
    }
}
