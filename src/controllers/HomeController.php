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
            'users' => $users->getUsersList(),
            'sections' => DbModel::getSections()
        ]);
    }

    public function search()
    {
        $users = new UsersModel();
        $data = Application::$app->request->getPostedFormData();
        $search_data = $data['search'];
        return Application::$app->router->renderView('home',[
            'doctors'=> DbModel::doctorNameSearch($search_data),
            'users' => $users->getUsersList(),
            'sections' => DbModel::getSections()
        ]);
    }

}