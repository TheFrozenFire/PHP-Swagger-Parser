<?php
namespace Swagger\ResourceListing;

use PHPUnit_Framework_TestCase as TestCase;
use stdClass;

class ApiTest extends TestCase {
    /**
     * Test the constructor
     *
     * @dataProvider provideResourceListingApiDocuments
     * 
     * @param stdClass $document
     *     An API representation
     */
    public function testConstructor($document) {
        $api = new Api($document);
        $this->assertInstanceOf('Swagger\ResourceListing\Api', $api);
    }
    
    /**
     * Test path getter
     *
     * @dataProvider provideResourceListingApis
     * 
     * @param Swagger\ResourceListing\Api $api
     */
    public function testGetPath($api) {
        $path = $api->getPath();
        $this->assertTrue(is_null($path) || is_string($path));
    }
    
    /**
     * Test path setter
     */
    public function testSetPath() {
        $api = new Api;
        
        $api->setPath('test');
        $this->assertEquals('test', $api->getPath());
    }
    
    /**
     * Test description getter
     *
     * @dataProvider provideResourceListingApis
     * 
     * @param Swagger\ResourceListing\Api $api
     */
    public function testGetDescription($api) {
        $description = $api->getDescription();
        $this->assertTrue(is_null($description) || is_string($description));
    }
    
    /**
     * Test description setter
     */
    public function testSetDescription() {
        $api = new Api;
        
        $api->setDescription('test');
        $this->assertEquals('test', $api->getDescription());
    }
    
    /**
     * Test the document getter
     * 
     * @dataProvider provideResourceListingApis
     *
     * @param Swagger\ResourceListing\Api $api
     */
    public function testGetDocument($api) {
        $document = $api->getDocument();
        
        $this->assertInstanceOf('stdClass', $document);
    }
    
    /**
     * Test the document setter
     * 
     * @dataProvider provideResourceListingApiDocuments
     * 
     * @param string $document
     */
    public function testSetDocument($document) {
        $api = new Api;
        
        $api->setDocument($document);
        $this->assertInstanceOf('stdClass', $api->getDocument());
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
        $api = new Api;
        
        $api->setDocument($document);
    }
    
    public function provideResourceListingApiDocuments() {
        $data = array();
        
        foreach(glob(__DIR__.'/../fixtures/resourcelisting*.json') as $filename) {
            $document = json_decode(file_get_contents($filename));
            if(property_exists($document, 'apis') && is_array($document->apis)) {
                foreach($document->apis as $api) {
                    $data[] = array(
                        $api
                    );
                }
            }
        }
        
        return $data;
    }
    
    public function provideResourceListingApis() {
        $documents = $this->provideResourceListingApiDocuments();
        
        $data = array();
        
        foreach($documents as $document) {
            $data[] = array(
                new Api($document[0])
            );
        }
        
        return $data;
    }
    
    public function provideInvalidDocuments() {
        return array(
            array(array()),
            array(array('path' => 'test')),
            array(null),
        );
    }
}
