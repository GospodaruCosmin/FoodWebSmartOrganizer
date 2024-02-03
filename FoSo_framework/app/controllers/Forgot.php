<?php
class Forgot extends Controller
{
    
    public function index(){
        //show($_POST);
        if(isset($_POST['user'])){
          $mail = new MailSender($_POST['user']);
          $mail -> sendMail();
          $_POST = array();
        } 
        else{
          $error = '';
          if(!empty($_GET['userInexistent']))
                $error =  "<p>Nu exista acest e-mail in baza de date!</p>";
          $this->view('forgot',$error);
        }
            
    }
}

?>