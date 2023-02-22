<?php 
namespace clinic\controllers;
use clinic\core\Application;

class AuthController{
    public function login()
    {
        return Application::$app->router->renderView('login');
    }
     
    public function signUp()
    {
        return Application::$app->router->renderView('sign-up');
    }
} 