<?php 

namespace clinic\models;
use clinic\core\Model;
use clinic\core\DbModel;


class UsersModel extends DbModel{

    const STATUS_PATIENT =0;
    const STATUS_DOCTOR = 1;
    const STATUS_ADMIN = 2;

    public int $status = self::STATUS_PATIENT;
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
            'username' => [self::RULE_REQUIRED,[self::RULE_UNIQUE , 'class'=> self::class]],
            'email' => [self::RULE_REQUIRED,self::RULE_EMAIL,[self::RULE_UNIQUE , 'class'=> self::class]],
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
        return ['name','username','email','password','status'];
    }
}