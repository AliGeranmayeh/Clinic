<?php 
namespace clinic\controllers;
use clinic\core\Application;
use clinic\core\Controller;
use clinic\models\UsersModel;
use clinic\models\LoginForm;

class AuthController extends Controller{
    public static function login()
    {
        if (Application::$app->user === null) {
            $loginForm = new LoginForm(); 
            self::setLayout('auth');
            if (Application::$app->request->method() === 'post') {
                $loginForm->loadData(Application::$app->request->getBody());
                if ($loginForm->validate() && $loginForm->login()) {
                    Application::$app->response->redirect('/');
                }
                return Application::$app->router->renderView('login',[
                    'model' => $loginForm
                ]);
            }
            return Application::$app->router->renderView('login',[
                'model' => $loginForm
            ]);   
        }
        return  Application::$app->router->renderView('forbiden');
    }
     
    public static function register()
    {   
        if (Application::$app->user === null) {
            self::setLayout('auth');
        $user = new UsersModel();
        if (Application::$app->request->method() === 'post') {
            $user->loadData(Application::$app->request->getBody());
            if ($user->validate() && $user->save()) {
                if ($user->isDoctor()) {
                    Application::$app->session->setFlash('doctor', 'you need to be varified by admins');
                }
                Application::$app->session->setFlash('seccess', 'thank you for registering');
                Application::$app->response->redirect('/');
            }
            return Application::$app->router->renderView('register',[
                'model' => $user
            ]);
        }
        return Application::$app->router->renderView('register',[
            'model' => $user
        ]);   
        }
        return  Application::$app->router->renderView('forbiden');
    }

    public function logout()
    {
        Application::$app->logout();
        Application::$app->response->redirect('/');
    }
} 