<?php 

namespace clinic\core;

class Application{

    public Database $db;
    public Controller $controller;
    public Request $request;
    public Router $router;
    public static Application $app; 
    public function __construct(array $config)
    {
        $this->controller = new Controller();
        self::$app = $this;
        $this->request = new Request();
        $this->router = new Router($this->request);
        $this->db = new Database($config['db']);
    }
    public function run()
    {
        echo $this->router->resolve();
    }
}