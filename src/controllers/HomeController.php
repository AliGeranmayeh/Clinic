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
        return Application::$app->router->renderView('home',[
            'doctors' => $doctor_model->getUsersList(),
            'users' => $users->getUsersList()
        ]);
    }

    public function search()
    {
        $doctor_model = new DoctorsModel();
        $data = Application::$app->request->getPostedFormData();
        $search_data = $data['search'];
        return Application::$app->router->renderView('home',[
            'search'=> $doctor_model->search(['name' => $search_data])
        ]);
    }

}