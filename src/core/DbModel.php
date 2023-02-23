<?php 
namespace clinic\core;

abstract class DbModel extends Model{

    abstract public function tableName() : string;

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
}