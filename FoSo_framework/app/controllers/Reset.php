<?php
class Reset extends Controller
{
    public function index(){
        if(!isset($_GET['id']))
        {
            header("Location: http://localhost/Facultate/Proiect/FoSo_framework/public/_404",TRUE, 303);
        }
        $changer = new PasswordChanger($_GET['id']);
        if($changer -> checkId()==0){
            header("Location: http://localhost/Facultate/Proiect/FoSo_framework/public/_404",TRUE, 303);
        }
        if(isset($_POST['password']) && isset($_POST['password-again']))
        {
            if($changer->checkMatch($_POST['password'],$_POST['password-again'])==1)
            {
                $changer->changePassword();
            }
            else 
                header("Location: http://localhost/Facultate/Proiect/FoSo_framework/public/reset?id=".$_GET['id']."&err=match",TRUE, 303);
            $_POST = array();
        }
        $error = '';
        if(isset($_GET['err']) && $_GET['err']=='match')
                    $error = '<p class="wrong-user-pass"> Passwords don\'t match!</p>';
        $this->view('reset',$error);
    }
}

?>
