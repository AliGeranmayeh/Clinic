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
        $users = new UsersModel();
        return Application::$app->router->renderView('home',[
            'doctors' => DbModel::getUDoctorList(),
            'users' => $users->getUSersList(),
            'sections' => DbModel::getSections(),
            'doctor_section' => [],
            'doctor_ids' => []
        ]);
    }

    public function search()
    {
        $users = new UsersModel();
        $data = Application::$app->request->getPostedFormData();
        return Application::$app->router->renderView('home',[
            'doctors'=> DbModel::doctorNameSearch($data['search'],$data["section_name"]),
            'users' => $users->getUsersList(),
            'sections' => DbModel::getSections(),
            'doctor_section' => [],
            'doctor_ids' => []
        ]);
    }

}