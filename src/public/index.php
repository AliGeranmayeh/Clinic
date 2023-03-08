<?php 
use clinic\core\Application;
use clinic\controllers\SiteController;
use clinic\controllers\AuthController;
use clinic\models\UsersModel;
use clinic\controllers\HomeController;
use clinic\controllers\ProfileController;

require_once __DIR__.'/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'user_class' => UsersModel::class,
    'db' =>[
        'dsn'=> $_ENV['DB_DSN'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'] 
    ]
];
$app = new Application($config);
$app->router->get('/',[HomeController::class,'home']);
$app->router->post('/',[HomeController::class,'search']);
$app->router->get('/profile',[ProfileController::class,'profile']);
$app->router->post('/profile',[ProfileController::class,'submitProfile']);
$app->router->get('/login',[AuthController::class,'login']);
$app->router->post('/login',[AuthController::class,'login']);
$app->router->get('/register',[AuthController::class,'register']);
$app->router->post('/register',[AuthController::class,'register']);
$app->router->get('/logout',[AuthController::class,'logout']);

$app->run();