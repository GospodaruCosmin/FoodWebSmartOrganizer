<?php

class App
{

    private $controller = 'Home';
    private $method  = 'index';
    //added by me

    //private int userConn = 0;

    private function splitURL(){
        $URL = $_GET['url'] ?? 'home';
        $URL = explode("/",$URL);
        return $URL;
    }
    
    public function loadController(){
        $URL = $this->splitURL();
        $controller_url = ucfirst($URL[0]);
       
            $filename = "../app/controllers/".$controller_url.".php";

            if(file_exists($filename))
            {
                require $filename;
                $this->controller = ucfirst($URL[0]);
            }else{
                $filename = "../app/controllers/_404.php";
                require $filename;
                $this->controller = "_404";
            }
        
        $controller = new $this->controller;
        call_user_func_array([$controller, $this->method] , []);
    }


}