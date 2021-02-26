<?php

namespace Kraenkvisuell\NovaCms;

class ProxyObject
{
    public $obj; 
    
    public function __construct( $obj ) {
        $this->_obj = $obj;
    }
    
    public function __get($key) {
        if (isset($this->_obj->$key)) {
            return $this->_obj->$key;
        }
        return null;
    }
    public function __set($key, $value) {
        $this->_obj->$key = $value;
    }
}
