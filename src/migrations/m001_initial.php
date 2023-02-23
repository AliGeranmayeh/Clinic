<?php 
use clinic\core\Application;

class m001_initial{

    public function up()
    {
        $db = Application::$app->db;
        $query = "CREATE TABLE users(
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            username VARCHAR(100) NOT NULL,
            password VARCHAR(100) NOT NULL,
            status TINYINT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )ENGINE=INNODB;";
        $db->pdo->exec($query);   
    }
    public function down()
    {
        $db = Application::$app->db;
        $query = "DROP TABLE users;";
        $db->pdo->exec($query);
    }
}