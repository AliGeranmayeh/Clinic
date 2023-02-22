<?php 
namespace clinic\core;

abstract class Model{


    public const RULE_REQUIRED = 'required';
    public const RULE_MIN = 'min';
    public const RULE_EMAIL = 'email';
    public const RULE_MATCH = 'match';

    public $errors  =[];
    public function loadData($data)
    {
        
        foreach ($data as $key => $value) {
            
            if (property_exists($this,$key)) {
                $this->{$key} = $value;
            }
        }
    }

    public abstract function rules():array;
    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $ $rule) {
                $rule_name = $rule;
                if(!is_string($rule_name)){
                    $rule_name = $rule[0];
                }
                if ($value == self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute,self::RULE_REQUIRED);
                }
            }
                    
        }
        return empty($this->errors);
            
    }
    public function addError($attribute , $rule_name)
    {
        $message = $this->errorMessages()?? '';
        $this->errors[$attribute][] = $message;
    }

    public function errorMessages()
    {
        return[
            self::RULE_REQUIRED => 'this field is requird',
            self::RULE_MIN => 'Min length of this field must be {min}',
            self::RULE_EMAIL => 'this field must be valid email address',
            self::RULE_MATCH => 'this field must be as same field of {match}'
        ];
    }
}