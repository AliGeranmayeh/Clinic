<?php 
namespace clinic\controllers;
use clinic\core\Application;
use clinic\core\Controller;
use clinic\models\UsersModel;

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
        $user = new UsersModel();
        if (Application::$app->request->method() === 'post') {
            $user->loadData(Application::$app->request->getBody());
            // var_dump( $user);
            // die();
            if ($user->validate() && $user->register()) {
                return 'Success';
            }
            return Application::$app->router->renderView('register',[
                'model' => $user
            ]);
        }
        return Application::$app->router->renderView('register',[
            'model' => $user
        ]);
    }
} 