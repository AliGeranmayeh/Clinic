<?php 
namespace clinic\core;

class Response{

    public function redirect(string $url)
    {
        header('Location: '.$url);
    }
}