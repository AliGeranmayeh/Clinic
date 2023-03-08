<?php 
namespace clinic\controllers;
use clinic\core\Controller;
use clinic\core\Application;
use clinic\core\DbModel;
use clinic\models\UsersModel;


class ProfileController  extends Controller{


    public function profile()
    {
        if (Application::$app->user) {
            $user = new UsersModel();
        return Application::$app->router->renderView('profile',[
            'is_doctor' => Application::$app->user->isDoctor(),
            'user' => $user
        ]);
        }
        return Application::$app->router->renderView('forbiden');
    }
    public function submitProfile()
    {
        var_dump(Application::$app->request->getBody());
        return Application::$app->router->renderView('profile');
    }
}