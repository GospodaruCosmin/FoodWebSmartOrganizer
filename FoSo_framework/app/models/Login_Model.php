<?php

class Login_Model
{
    use Database;
    function checkUser($data){
        if(!empty($data['user']) && !empty($data['password'])){
            $mysql = $this->connect();
            $query = 'select email_address, password from users';
            if (!($rez = $mysql->query ($query))) {
                die ('A survenit o eroare la interogare'); // view personalizat de eroare
            }
            $ok = 0;
            while ($inreg = $rez->fetch_assoc()){
                $user =$inreg['email_address'];
                if($user == $data['user'] && password_verify($data['password'], $inreg['password']))
                {
                    $ok=1;
                    break;
                }  
            }
            if($ok == 1){
               setcookie("userConn",$user,time() + (86400 * 30), "/");               
                return 1;
            }
                
           

        }
        header("Location: http://localhost/Facultate/Proiect/FoSo_framework/public/login?x=y",TRUE,303);


    }
}


?>