<?php
namespace Swagger;

use PHPUnit_Framework_TestCase as TestCase;
use Zend\Stdlib\Hydrator;

class TraversalTest extends TestCase {
    /**
     * Test a deep traversal of a Resource Listing
     *
     * @dataProvider provideResourceListing
     * 
     * @param Swagger\Document $document
     */
    public function testTraversal(Document $document) {
        $hydrator = $this->getHydrator();
        
        $values = $hydrator->extract($document);
        foreach($values as $value) {
            if($value instanceof Swagger\Document) {
                $this->testTraversal($value);
            } elseif(is_array($value)) {
                foreach($value as $subDocument) {
                    if($value instanceof Swagger\Document) {
                        $this->testTraversal($subDocument);
                    }
                }
            }
        }
    }
    
    public function getHydrator() {
        $hydrator = new Hydrator\ClassMethods;
        $hydrator->addFilter('getDocumentProperty', new Hydrator\Filter\MethodMatchFilter('getDocumentProperty'), Hydrator\Filter\FilterComposite::CONDITION_AND);
        $hydrator->addFilter('getSubDocument', new Hydrator\Filter\MethodMatchFilter('getSubDocument'), Hydrator\Filter\FilterComposite::CONDITION_AND);
        $hydrator->addFilter('getSubDocuments', new Hydrator\Filter\MethodMatchFilter('getSubDocuments'), Hydrator\Filter\FilterComposite::CONDITION_AND);
        $hydrator->addFilter('getDocument', new Hydrator\Filter\MethodMatchFilter('getDocument'), Hydrator\Filter\FilterComposite::CONDITION_AND);
        
        return $hydrator;
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
}
