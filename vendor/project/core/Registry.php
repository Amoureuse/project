<?php

namespace project;

class Registry
{

    private static $instance;
    protected static $properties = [];
    
    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public function setProperty($name, $value)
    {
        self::$properties[$name] = $value;
    }
    
    public function getProperty($name)
    {
        if (isset(self::$properties[$name])) {
            return self::$properties[$name]; 
        }
        return null;       
    }
    
    public function getProperties()
    {
        return self::$properties;
    }
}
