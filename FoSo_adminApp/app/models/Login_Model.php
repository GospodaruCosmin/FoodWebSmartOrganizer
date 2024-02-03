<?php

class Login_Model
{
    use Database;
    
    function checkAdmin($data){
        
        header("Location: http://localhost/Facultate/Proiect/FoSo_adminApp/public/login?x={$data['username']}",TRUE,303);
        if(!empty($data['username']) && !empty($data['password'])){
            $mysql = $this->connect();
            $query = 'select email_address, password from users where admin = 1';
            if (!($rez = $mysql->query ($query))) {
                die ('A survenit o eroare la interogare'); // view personalizat de eroare
            }
            $ok = 0;
            while ($inreg = $rez->fetch_assoc()){
                $user =$inreg['email_address'];
                if($user == $data['username'] && password_verify($data['password'], $inreg['password']))
                {
                    $ok=1;
                    break;
                }  
            }
            if($ok == 1){
               setcookie("adminConn",$user,time() + (86400 * 30), "/");               
                return 1;
            }
                
           

        }
        header("Location: http://localhost/Facultate/Proiect/FoSo_adminApp/public/login?x=y",TRUE,303);



    }
}


?>