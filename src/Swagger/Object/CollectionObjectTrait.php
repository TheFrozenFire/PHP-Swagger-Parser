<?php
namespace Swagger\Object;

trait CollectionObjectTrait
{
    public function getAllKeys()
    {
        $keys = array_keys(get_object_vars($this->getDocument()));
        $ignoredKeys = $this->getIgnoredKeys();
        
        foreach($keys as $key) {
            if(substr($key, 0, 2) === 'x-' || in_array($key, $ignoredKeys, true)) {
                unset($keys[$key]);
            }
        }
        
        return $keys;
    }
    
    public function getAll()
    {
        $keys = $this->getAllKeys();
        $items = [];
        
        foreach($keys as $key) {
            $items[$key] = $this->getItem($key);
        }
        
        return $items;
    }
    
    abstract public function getItem($key);
    
    public function getIgnoredKeys()
    {
        return [];
    }
}
