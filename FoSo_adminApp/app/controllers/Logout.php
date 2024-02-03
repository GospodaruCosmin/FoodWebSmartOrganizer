<?php
class Logout extends Controller
{
    public function index(){
        setcookie('adminConn', '', time() - 3600, '/');
        //header("Location: ../controllers/login_controller.php",TRUE,303);
        header("Location: http://localhost/Facultate/Proiect/FoSo_adminApp/public/",TRUE,303);
    }
}


?>