<?php 
namespace clinic\controllers;
use clinic\core\Application;

class AuthController{
    public function login()
    {
        if (Application::$app->request->method() === 'post') {
            return 'handle data';
        }
        return Application::$app->router->renderView('login');
    }
     
    public function signUp()
    {
        if (Application::$app->request->method() === 'post') {
            return 'handle data';
        }
        return Application::$app->router->renderView('sign-up');
    }
} 