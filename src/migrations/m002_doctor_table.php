<?php 
use clinic\core\Application;

class m002_doctor_table{

    public function up()
    {
        $db = Application::$app->db;
        $query = "CREATE TABLE doctors(
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            medical_code INT NOT NULL,
            office_address TEXT NOT NULL,
            visit INT NOT NULL,
            phone_number INT NOT NULL,
            website_url VARCHAR(100) NOT NULL,
            Monday_time	varchar(255) NOT NULL,	
	        Tuesday_time varchar(255) NOT NULL,	
		    Wednesday_time varchar(255) NOT NULL,	
		    Thursday_time varchar(255) NOT NULL,	
		    Friday_time	varchar(255) NOT NULL,	
		    Saturday_time varchar(255) NOT NULL,	
		    Sunday_time	varchar(255) NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )ENGINE=INNODB;";
        $db->pdo->exec($query);   
    }
    public function down()
    {
        $db = Application::$app->db;
        $query = "DROP TABLE doctors;";
        $db->pdo->exec($query);
    }
}