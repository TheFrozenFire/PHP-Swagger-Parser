<?php
namespace Swagger\Exception;

trait AdditionalExceptionContextTrait
{
    protected $additionalContext = [];

    public function __toString()
    {
        $output = parent::__toString();
        
        if(empty($this->additionalContext)) {
            return $output;
        }
        
        $output .= PHP_EOL.'Additional Context:'.PHP_EOL;
        
        foreach($this->additionalContext as $name => $contextItem) {
            $contextName = empty($contextItem['name'])?$name:$contextItem['name'];
            if(
                is_object($contextItem['value'])
                || is_array($contextItem['value'])
            ) {
                $contextValue = PHP_EOL.print_r($contextItem['value'], true);
            } else {
                $contextValue = $contextItem['value'];
            }   
        
            $contextOutput = "[{$contextName}]".PHP_EOL;
            
            if(!empty($contextItem['description'])) {
                $contextOutput .= "\tDescription: {$contextItem['description']}".PHP_EOL;
            }
            
            $contextOutput .= "\tValue: {$contextValue}".PHP_EOL;
        
            $output .= $contextOutput;
        }
        
        return $output;
    }
    
    protected function getAdditionalContext()
    {
        return $this->additionalContext;
    }
    
    protected function setAdditionalContext($additionalContext)
    {
        $this->additionalContext = $additionalContext;
        return $this;
    }
    
    protected function addAdditionalContext($name, $value, $description = null)
    {
        $contextItem = [
            'value' => $value,
            'description' => $description,
        ];
        
        $this->additionalContext[$name] = $contextItem;
        return $this;
    }
}
