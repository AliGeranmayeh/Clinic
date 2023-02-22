<?php 

namespace clinic\core;

class Router{

    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    private array $routes = [];
    public function get($path,$callback)
    {
        $this->routes['get']["$path"] = $callback;
    }

    public function post($path,$callback)
    {
        $this->routes['post']["$path"] = $callback;
    }

    public function resolve()
    {
        
    }
}