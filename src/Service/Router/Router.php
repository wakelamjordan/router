<?php

namespace App\Service\Router;

use Exception;

class Router
{
    private $routes=[];
    public function __construct(
        private $url,
    ) {
    }

    /**
     * Get
     */
    public function get($path, $callable)
    {
        //création de mon objet route 
        $route=new Route($path, $callable);
        // ajout dans le tableau routes en get
        $this->routes['GET'][]=$route;
    }
    /**
     * Post
     */
    public function post($path, $callable)
    {
        //création de mon objet route 
        $route=new Route($path, $callable);
        // ajout dans le tableau routes en get
        $this->routes['POST'][]=$route;
    }
    /**
     * Put
     */
    public function put($path, $callable)
    {
        //création de mon objet route 
        $route=new Route($path, $callable);
        // ajout dans le tableau routes en get
        $this->routes['PUT'][]=$route;
    }
    /**
     * Delete
     */
    public function delete($path, $callable)
    {
        //création de mon objet route 
        $route=new Route($path, $callable);
        // ajout dans le tableau routes en get
        $this->routes['DELETE'][]=$route;
    }

    public function run(){
        // echo '<pre>';
        // echo print_r($this->routes);
        // echo '</pre>';
        //on va vérifier si la route est valide
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new RouterException('No Routes matches');
        };

        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if($route->match($this->url)){
                $route->call();
            }
        }
        throw new RouterException('No matching Routes');
    }
}
