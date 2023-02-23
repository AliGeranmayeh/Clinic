<?php 

namespace clinic\models;
use clinic\core\Model;
use clinic\core\DbModel;

class UsersModel extends DbModel{
    public String $name;
    public String $username;
    public String $password;
    public String $email;
    public String $confirm_password;

    public function save()
    {
        $this->password = password_hash($this->password,PASSWORD_DEFAULT);
        return parent::save();
    }
    public function rules():array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'username' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED,self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED,[self::RULE_MIN,'min' => 8]],
            'confirm_password' => [self::RULE_REQUIRED,[self::RULE_MATCH,'match' => 'password']],
        ];
    }
    public function tableName() :string
    {
        return 'users';
    }

    public function attributes() :array
    {
        return ['name','username','email','password'];
    }
}