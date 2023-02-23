<?php 
use clinic\core\Application;
use clinic\controllers\SiteController;
use clinic\controllers\AuthController;

require_once './../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'db' =>[
        'dsn'=> $_ENV['DB_DSN'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'] 
    ]
];
$app = new Application($config);

$app->db->applyMigrations();