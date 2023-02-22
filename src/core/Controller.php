<?php 
 namespace clinic\core;



 class Controller{

    public static $layout = 'main';
    public static function setLayout($layout)
    {
        self::$layout = $layout;
    }
 }