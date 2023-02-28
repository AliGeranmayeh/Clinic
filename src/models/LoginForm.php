<?php 

namespace clinic\models;
use clinic\core\Model;


class LoginForm extends Model{

    public string $username;
    public string $password;

    public function rules() :array
    {
        return [
            'username' => [self::RULE_REQUIRED,[self::RULE_UNIQUE , 'class'=> self::class]],
            'password' => [self::RULE_REQUIRED,[self::RULE_MIN,'min' => 8]]
        ];
    }
}