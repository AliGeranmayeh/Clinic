<?php 

namespace clinic\core;

class Application{
    
    public Router $router;
    
    public function __construct()
    {
        $router = new Router();
    }
    public function run()
    {
        echo $this->router->resolve();
    }
}