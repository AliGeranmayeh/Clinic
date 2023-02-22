<?php 
use clinic\core\Application;
use clinic\controllers\SiteController;
use clinic\controllers\AuthController;

require_once __DIR__.'/../../vendor/autoload.php';

$app = new Application();
$app->router->get('/',[SiteController::class,'home']);
$app->router->get('/doctor_info',[SiteController::class,'doctorInfo']);
$app->router->post('/doctor_info',[SiteController::class,'handleDoctorInfo']);
$app->router->get('/login',[AuthController::class,'login']);
$app->router->post('/login',[AuthController::class,'login']);
$app->router->get('/register',[AuthController::class,'register']);
$app->router->post('/register',[AuthController::class,'register']);

$app->run();