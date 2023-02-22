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
        $path =  $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes["$method"]["$path"] ?? false;

        if(!$callback){
            return "404 NOT FOUND";
        }
        return call_user_func($callback);
    }
}