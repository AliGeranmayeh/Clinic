<?php 
namespace clinic\core;


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

        return true;
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
}