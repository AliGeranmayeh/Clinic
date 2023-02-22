<?php 
namespace clinic\controllers;
use clinic\core\Application;
use clinic\core\Controller;

class AuthController extends Controller{
    public static function login()
    {
        self::setLayout('auth');
        if (Application::$app->request->method() === 'post') {
            return 'handle data';
        }
        return Application::$app->router->renderView('login');
    }
     
    public static function register()
    {   
        self::setLayout('auth');
        if (Application::$app->request->method() === 'post') {
            return 'handle data';
        }
        return Application::$app->router->renderView('register');
    }
} 