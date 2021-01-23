<?php 
namespace Src\Controller;

class Controller{


    public function sanitize($str){
        return filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    }

}