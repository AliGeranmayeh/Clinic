<?php 

namespace clinic\core;

class Request{

    public function getPath()
    {
        $path  = $_SERVER['REQUEST_URI'] ?? false;
        $position = strpos($path,'?');
        if(!$position){
            return $path;
        }
        return substr($path,0,$position);
    }

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}