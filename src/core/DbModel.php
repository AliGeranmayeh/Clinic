<?php 
namespace clinic\core;
use clinic\models\UsersModel;


abstract class DbModel extends Model{

    abstract public static function tableName() : string;

    abstract public function attributes() : array;

    public function save()
    {
        $table_name = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr)=>":$attr",$attributes);
        $stmnt = Application::$app->db->pdo->prepare("INSERT INTO $table_name (".implode(',',$attributes).")
        VALUES (".implode(',',$params).");");

        foreach ($attributes as $attribute) {
            $stmnt->bindValue(":$attribute",$this->{$attribute});
        }
        $stmnt->execute();
        
        $username = $this->{$attributes[1]};
        $user =  self::findOne(['username' => $username]);
        return Application::$app->auth($user);
    }

    public static function findOne($where)
    {
        $table_name = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND", array_map(fn($attr)=>"$attr = :$attr" , $attributes));
        $stmnt = Application::$app->db->pdo->prepare("SELECT * FROM $table_name WHERE $sql");
        foreach ($where as $key => $value) {
            $stmnt->bindValue(":$key",$value);
        }
        $stmnt->execute();
        return $stmnt->fetchObject(static::class);
    }

    public function displayUser()
    {
        return $this->username ?? '';
    }

    public function isDoctor()
    {
        return ($this->type==1)?true :false;
    }

    public function getUsersList()
    {
        $table_name = static::tableName();
        $stmnt = Application::$app->db->pdo->prepare("SELECT * FROM $table_name");
        $stmnt->execute();
        return $stmnt->fetchAll(\PDO::FETCH_OBJ);
    }

    // public function search($like)
    // {
    //     $table_name = static::tableName();
    //     $attribute = array_keys($like);
    //     $sql = "$attribute = :$attribute";
    //     $stmnt = Application::$app->db->pdo->prepare("SELECT * FROM $table_name LIKE $sql");
    //     $stmnt->bindValue(":$attribute","$like%");
    //     $stmnt->execute();
    //     return $stmnt->fetchAll(\PDO::FETCH_OBJ);
    // }

    public static function doctorNameSearch($like , $section)
    {
        if ($section !== " ") {
            $stmnt = Application::$app->db->pdo->prepare("SELECT DISTINCT doctors.* , sections.name as section_name FROM doctors,users,sections,doctors_sections WHERE users.id = doctors.user_id AND doctors.id = doctors_sections.doctor_id AND doctors_sections.section_id = sections.id AND users.name LIKE ? AND sections.id = ?");
            $stmnt->execute(["$like%" , $section]);
        }
        else {
            $stmnt = Application::$app->db->pdo->prepare("SELECT DISTINCT doctors.* , sections.name as section_name FROM doctors,users,sections,doctors_sections WHERE users.id = doctors.user_id AND doctors.id = doctors_sections.doctor_id AND doctors_sections.section_id = sections.id AND users.name LIKE ?");
            $stmnt->execute(["$like%"]);
        }
        return $stmnt->fetchAll(\PDO::FETCH_OBJ);
    }
    public static function getSections()
    {
        $stmnt = Application::$app->db->pdo->prepare("SELECT * FROM sections");
        $stmnt->execute();
        return $stmnt->fetchAll(\PDO::FETCH_OBJ);  
    }
}