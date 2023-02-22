<?php 
namespace clinic\controllers;
use clinic\core\Application;
use clinic\core\Controller;


class SiteController extends Controller{


    public static function doctorInfo()
    {
        return Application::$app->router->renderView('doctor_info');
    }
    public static function home()
    {
        return Application::$app->router->renderView('home');
    }
    public static function handleDoctorInfo()
    {
        var_dump(Application::$app->request->getBody());
        return "handling data";
    }
}