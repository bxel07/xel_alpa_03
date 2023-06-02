<?php
namespace xel\framework\Helper;

class Boostrapclass {
    public function __construct()
    {
        spl_autoload_register([$this, 'register']);
    }

    public function register(string $class) 
    {
        $class = substr($class, strlen(__NAMESPACE__.'\\'));
        $class = str_replace('\\','/',$class);
        $class = $class.'.php';
        if(!file_exists($class)) {
            return;
        }
        require_once $class;
    }
}