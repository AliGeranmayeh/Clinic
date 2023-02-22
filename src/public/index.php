<?php 
use clinic\core\Application;

require_once __DIR__.'/../../vendor/autoload.php';

$app = new Application();
$app->router->get('/','home');
$app->router->get('/doctor_info','doctor_info');
$app->router->post('/doctor_info','doctor_info');

$app->run();