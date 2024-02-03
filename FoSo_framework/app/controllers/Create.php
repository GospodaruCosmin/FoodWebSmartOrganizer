<?php

class Create extends Controller
{
    public function index(){
        if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['password'])){
            $_SESSION['firstName'] = $_POST['firstName'];
            $_SESSION['lastName'] = $_POST['lastName'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
            $newUser = new InsertNewUser();
            if($newUser->checkEmail() == 1){
                $newUser->registerUser();
                header(
                    "Location: http://localhost/Facultate/Proiect/FoSo_framework/public/createsecond",
                    TRUE,
                    303
                );
            } else $this->view('create','Deja exista acest e-mail in baza de date!');
            
            //echo $_POST['firstName'];
        } else
        $this->view('create');
    }
}
?>