<?php 
use clinic\core\Application;
use clinic\controllers\SiteController;
use clinic\controllers\AuthController;

require_once __DIR__.'/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'db' =>[
        'dsn'=> $_ENV['DB_DSN'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'] 
    ]
];
$app = new Application($config);
$app->router->get('/',[SiteController::class,'home']);
$app->router->get('/doctor_info',[SiteController::class,'doctorInfo']);
$app->router->post('/doctor_info',[SiteController::class,'handleDoctorInfo']);
$app->router->get('/login',[AuthController::class,'login']);
$app->router->post('/login',[AuthController::class,'login']);
$app->router->get('/register',[AuthController::class,'register']);
$app->router->post('/register',[AuthController::class,'register']);

$app->run();