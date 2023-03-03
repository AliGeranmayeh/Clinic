<?php 
namespace clinic\controllers;

use clinic\core\Application;
use clinic\core\Controller;
use clinic\models\DoctorsModel;
use clinic\models\UsersModel;
use clinic\core\DbModel;



class HomeController extends Controller{

    public function home()
    {
        $doctor_model = new DoctorsModel();
        $users = new UsersModel();
        $doctor_model->getUsersList();
        return Application::$app->router->renderView('home',[
            'doctors' => $doctor_model->getUsersList(),
            'users' => $users->getUsersList()
        ]);
    }

}