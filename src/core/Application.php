<?php 

namespace clinic\core;

class Application{

    public string $user_class;
    public Session $session;
    public Response $response;
    public Database $db;
    public Controller $controller;
    public Request $request;
    public Router $router;
    public static Application $app; 
    public ?DbModel $user;
    public function __construct(array $config)
    {
        $this->controller = new Controller();
        self::$app = $this;
        $this->request = new Request();
        $this->router = new Router($this->request);
        $this->db = new Database($config['db']);
        $this->response = new Response();
        $this->session = new Session();
        $this->user_class = $config["user_class"];
        $primary_value = $this->session->get('user');
        if ($primary_value) {
            $this->user = $this->user_class::findOne(['id'=>$primary_value]);
        }
        else {
            $this->user = null;
        }
    }
    public function run()
    {
        echo $this->router->resolve();
    }

    public function auth(DbModel $user)
    {
        $this->user = $user;
        $primary_key = 'id';
        $primary_value = $user->{$primary_key};
        $this->session->set('user', $primary_value);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }
}