<?php 
namespace clinic\core;


class Database{

    public \PDO $pdo;

    public function __construct(array $config)
    {
        $dsn = $config['dsn'] ?? '';
        $username = $config['username'] ?? '';
        $password = $config['password'] ?? '';

        $this->pdo = new \PDO($dsn , $username, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations()
    {
        $this->createMigrationTable();
        $applied_migrations=$this->getAppliedMigrations();

        $new_migrations = [];
        $file = scandir(__DIR__.'/../migrations');
        $to_apply_migration = array_diff($file,$applied_migrations);
        foreach ($to_apply_migration as  $migration) {
            if ($migration === '.' || $migration === '..') {
                continue;
            }

            require_once __DIR__."/../migrations/$migration";
            $class_name =pathinfo($migration,PATHINFO_FILENAME);
            $instance = new $class_name();
            $this->log("Applying migration $migration");
            $instance->up();
            $this->log("Applied migration $migration");
            $new_migrations[] = $migration;
        }
        if (!empty($new_migrations)) {
            $this->saveMigrations($new_migrations);
        }
        else {
            $this->log("All migrations are applied.");
        }
    }
    public function createMigrationTable()
    {
        
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;");
    
    }
    public function getAppliedMigrations()
    {
        $stmt = $this->pdo->prepare('SELECT migration FROM migrations');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }
    public function saveMigrations(array $migrations)
    {   
        $str_migration = implode(',',array_map(fn($m)=>"('$m')",$migrations));
        $stmnt= $this->pdo->prepare("
        INSERT INTO migrations (migration) VALUES
        $str_migration;
        ");
        $stmnt->execute();
    }

    protected function log($message)
    {
        echo '['.date('Y-m-d H:i:s').'] - '.$message.PHP_EOL;
    }
}