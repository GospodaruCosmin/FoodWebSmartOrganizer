<?php

class Login extends Controller
{
    public function index(){
       
        if (isset($_COOKIE['userConn'])) {
            header("Location: http://localhost/Facultate/Proiect/FoSo_framework/public/home",TRUE,303);
        } 
        if(!empty($_POST)){
            $login_model = new Login_Model;
            if($login_model->checkUser($_POST) == 1){
                //show("conectat cu succes!");
                header("Location: http://localhost/Facultate/Proiect/FoSo_framework/public/home",TRUE,303);
            }
        }
        $error = '';
        if(!empty($_GET['x'])){
            $error = '<p class="wrong-user-pass"> Username sau parola gresite!</p>';
        }
        $this->view('login', $error);
    }
}


?>