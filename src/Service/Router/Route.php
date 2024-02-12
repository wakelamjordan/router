<?php

namespace App\Service\Router;

class Route
{
    public function __construct(
        private $path,
        private $callable,
    ) {
    }

    public function match($url)
    {
        $url = trim($url, '/');
        $path = preg_replace('#:([\w]+)#', '([^\]+)', $this->path);
        
    }
}
