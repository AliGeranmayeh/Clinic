<?php 
namespace clinic\controllers;
use clinic\core\Application;

class AuthController{
    public static function login()
    {
        if (Application::$app->request->method() === 'post') {
            return 'handle data';
        }
        return Application::$app->router->renderView('login');
    }
     
    public static function register()
    {
        if (Application::$app->request->method() === 'post') {
            return 'handle data';
        }
        return Application::$app->router->renderView('register');
    }
} 