<?php

class Controller{
    public function checkConnected(){
        if(!isset($_COOKIE['adminConn']))
        header(
            "Location: http://localhost/Facultate/Proiect/FoSo_adminApp/public/login",
            TRUE,
            303
        );
    }
    public function view($name, $err = '',$data = '',$users=''){
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