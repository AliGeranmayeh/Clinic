<?php 
namespace clinic\models;
use clinic\core\DbModel;

class DoctorsModel extends DbModel{
    public $user_id;
    public $medical_code;
    public $office_address;
    public $visit;
    public $phone_number;
    public $website_url;
    public $Monday_time;
    public $Tuesday_time;
    public $Wednesday_time;
    public $Thursday_time;
    public $Friday_time; 
    public $Saturday_time;
    public $Sunday_time;

    public static function tableName() :string
    {
        return 'doctors';
    }

    public function attributes() :array
    {
        return ['medical_code','office_address','visit','phone_number','website_url','Monday_time','Tuesday_time','Wednesday_time','Thursday_time','Friday_time','Saturday_time','Sunday_time'];
    }

    public function rules():array
    {
        return ['medical_code' => [self::RULE_REQUIRED],
        'office_address'=> [self::RULE_REQUIRED],
        'visit' => [self::RULE_REQUIRED],
        'phone_number'=> [self::RULE_REQUIRED],
        'website_url'=> [self::RULE_REQUIRED],
        'Monday_time'=> [self::RULE_REQUIRED],
        'Tuesday_time'=> [self::RULE_REQUIRED],
        'Wednesday_time'=> [self::RULE_REQUIRED],
        'Thursday_time'=> [self::RULE_REQUIRED],
        'Friday_time'=> [self::RULE_REQUIRED],
        'Saturday_time'=> [self::RULE_REQUIRED],
        'Sunday_time'=> [self::RULE_REQUIRED]];   
    }

}