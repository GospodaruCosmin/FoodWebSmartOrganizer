<?php

class Createsecond extends Controller
{
    public function index(){
       if(isset($_POST['nothing']))
       {
        $this->view('welcome');
       }else if(isset($_POST['intolerances'])){
        $newUserIntolerances = new InsertNewUser();
        $newUserIntolerances->insertAllergies($_POST['intolerances']);
        unset($_SESSION['firstName']);
        unset($_SESSION['lastName']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        $this->view('welcome');
       } 
       else
        $this->view('create2');
    }
}
?>