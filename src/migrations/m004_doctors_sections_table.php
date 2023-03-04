<?php 
use clinic\core\Application;

class m004_doctors_sections_table{

    public function up()
    {
        $db = Application::$app->db;
        $query = "CREATE TABLE doctors_sections(
            id INT AUTO_INCREMENT PRIMARY KEY,
            doctor_id INT NOT NULL,
            section_id INT NOT NULL,
            FOREIGN KEY (doctor_id) REFERENCES doctors(id),
            FOREIGN KEY (section_id) REFERENCES sections(id)
        )ENGINE=INNODB;";
        $db->pdo->exec($query);   
    }
    public function down()
    {
        $db = Application::$app->db;
        $query = "DROP TABLE doctors_sections;";
        $db->pdo->exec($query);
    }
}