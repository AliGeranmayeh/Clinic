<?php 
use clinic\core\Application;
use clinic\controllers\SiteController;

require_once __DIR__.'/../../vendor/autoload.php';

$app = new Application();
$app->router->get('/',[SiteController::class,'home']);
$app->router->get('/doctor_info',[SiteController::class,'doctorInfo']);
$app->router->post('/doctor_info',[SiteController::class,'handleDoctorInfo']);

$app->run();