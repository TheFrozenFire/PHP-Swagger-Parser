<?php
namespace Swagger;

use PHPUnit_Framework_TestCase as TestCase;
use stdClass;

class DocumentTest extends TestCase {
    /**
     * Test the constructor
     * 
     * @dataProvider provideDocuments
     * 
     * @param mixed $value
     */
    public function testConstructor($value) {
        $document = $this->getDocumentMock($value);
        $this->assertInstanceOf('Swagger\Document', $document);
    }
    
    /**
     * Test the document getter
     * 
     * @dataProvider provideDocuments
     * 
     * @param mixed $documentValue
     */
    public function testGetDocument($documentValue) {
        $document = $this->getDocumentMock($documentValue);
        
        $this->assertInstanceOf('stdClass', $document->getDocument());
    }
    
    /**
     * Test the document setter
     */
    public function testSetDocument() {
        $document = $this->getDocumentMock();
        
        $documentValue = new stdClass;
        $documentValue->a = 1;
        
        $document->setDocument($documentValue);
        $this->assertInstanceOf('stdClass', $document->getDocument());
        $this->assertEquals($documentValue, $document->getDocument());
    }
    
    public function provideDocuments() {
        return array(
            array(null),
            array(new stdClass),
        );
    }
    
    protected function getDocumentMock($document = null) {
        return $this->getMock('Swagger\Document', null, array($document));
    }
}
