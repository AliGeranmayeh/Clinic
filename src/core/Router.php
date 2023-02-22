<?php 

namespace clinic\core;

class Router{

    private array $routes = [];
    public function get($path,$callback)
    {
        $this->routes['get']["$path"] = $callback;
    }

    public function post($path,$callback)
    {
        $this->routes['post']["$path"] = $callback;
    }
}