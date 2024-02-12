<?php
namespace App\Service;
class Autoload{
    public function __construct()
    {
        spl_autoload_register(function($class){
            $class=str_replace('App','',$class);
            $path=str_replace('\\','/',dirname(__DIR__).$class.'.php');
            require_once $path;
        });
    }
}