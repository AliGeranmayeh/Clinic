<?php 

namespace clinic\core;

class Application{
    
    private Request $request;
    public Router $router;
    public static Application $app; 
    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }
    public function run()
    {
        echo $this->router->resolve();
    }
}