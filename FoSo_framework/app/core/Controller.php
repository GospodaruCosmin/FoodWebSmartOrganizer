<?php

class Controller{
    public function checkConnected(){
        if(!isset($_COOKIE['userConn']))
        header(
            "Location: http://localhost/Facultate/Proiect/FoSo_framework/public/login",
            TRUE,
            303
        );
    }
    public function view($name, $err = '',$data = '',$content = ''){
        $filename = "../app/views/".$name.".view.php";
        if(file_exists($filename))
        {
            require $filename;
        }else{
            $filename = "../app/views/404.view.php";
            require $filename;
        }
    }


}




?>