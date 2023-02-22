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
        return [];
    }
}