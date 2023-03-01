<?php 

namespace clinic\models;
use clinic\core\Model;
use clinic\core\Application;


class LoginForm extends Model{

    public string $username = '';
    public string $password = '';

    public function rules() :array
    {
        return [
            'username' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED,[self::RULE_MIN,'min' => 8]]
        ];
    }
    public function login()
    {
       $user =  UsersModel::findOne(['username' => $this->username]);

       if (!$user) {
           $this->errors['username'][] = 'User does not exist with this username';
           return false;
       }
       if (!password_verify($this->password,$user->password)) {
        $this->errors['password'][] = 'Password is incorrect';
        return false;
       }

       return Application::$app->auth($user);
    }
    public function tableName() :string
    {
        return 'users';
    }
}