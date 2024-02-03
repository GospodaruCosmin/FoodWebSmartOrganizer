<?php
class Logout extends Controller
{
    public function index(){
        setcookie('userConn', '', time() - 3600, '/');
        //header("Location: ../controllers/login_controller.php",TRUE,303);
        header("Location: http://localhost/Facultate/Proiect/FoSo_framework/public/login",TRUE,303);
    }
}


?>