<?php 
use clinic\core\Application;

class m003_sections_table{

    public function up()
    {
        $db = Application::$app->db;
        $query = "CREATE TABLE sections(
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL
        )ENGINE=INNODB;";
        $db->pdo->exec($query);   
    }
    public function down()
    {
        $db = Application::$app->db;
        $query = "DROP TABLE sections;";
        $db->pdo->exec($query);
    }
}