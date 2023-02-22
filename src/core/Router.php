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
            http_response_code(404);
            return $this->renderView("_404");
        }
        if(is_string($callback)){
            return $this->renderView($callback);
        }
        return call_user_func($callback);
    }

    public function renderView($view)
    {
        $layout_content = $this->layoutContent();
        $view_content = $this->renderOnlyView($view);
        return str_replace('{{content}}',$view_content,$layout_content);
       
    }
    protected function layoutContent()
    {
        ob_start();
        include_once "./../views/layouts/main.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view)
    {
        ob_start();
        include_once "./../views/$view.php";
        return ob_get_clean();
    }

}