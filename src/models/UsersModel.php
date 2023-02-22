<?php 

namespace clinic\models;
use clinic\core\Model;
class UsersModel extends Model{
    public String $name;
    public String $username;
    public String $password;
    public String $email;
    public String $confirm_password;

    public function register()
    {
        return 'creating new user';
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
}