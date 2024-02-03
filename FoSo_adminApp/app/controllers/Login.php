<?php

class Login extends Controller
{
    public function index(){
        if (isset($_COOKIE['adminConn'])) {
            header("Location: http://localhost/Facultate/Proiect/FoSo_adminApp/public/hom",TRUE,303);
        }
        if(!empty($_POST)){
            $err = $_POST['username'];
            $login_model = new Login_Model;
            if($login_model->checkAdmin($_POST) == 1){
                //show("conectat cu succes!");
                header("Location: http://localhost/Facultate/Proiect/FoSo_adminApp/public/home",TRUE,303);
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