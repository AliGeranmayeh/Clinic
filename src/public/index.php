<?php 

require_once __DIR__.'/../../vendor/autoload.php';

$app = new Application();
$app->router->get('/','home');
$app->run();