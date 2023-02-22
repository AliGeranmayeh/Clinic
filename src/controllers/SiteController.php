<?php 
namespace clinic\controllers;
use clinic\core\Application;


class SiteController{


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
        return "handling data";
    }
}