<?php
class MailSender{
    use Database;
    private $mail_to;

    function __construct($mail_to){
        $this->mail_to = $mail_to;
    }
    function sendMail(){
        $mysql = $this->connect();
        $query = 'select id,email_address from users';
        if (!($rez = $mysql->query ($query))) {
            die ('A survenit o eroare la interogare'); // view personalizat de eroare
        }
        $ok = 0;
        while ($inreg = $rez->fetch_assoc()){
            if($inreg['email_address'] == $this->mail_to)
            {
                $id_user = $inreg['id'];
                $ok=1;
                break;
            }  
        }

        if($ok == 1){
            $query = "INSERT INTO change_password (id_user) VALUES ('$id_user')";
            if (!($rez = $mysql->query ($query))) {
                die ('A survenit o eroare la inserare'); // view personalizat de eroare
            }
            $reset_link = "http://localhost/Facultate/Proiect/FoSo_framework/public/reset?id=$id_user";
            $subject = "Reset you password";
            $content = 
            "Hello, you requested to change your password! If this isn't you ignore this message. 
            Otherwise please click this <a href= '$reset_link'>link</a>" ;
            $headers = "From: foodapp4suport@gmail.com\r\nReply-To: foodapp4suport@gmail.com";
            $mail_sent = mail($this->mail_to, $subject, $content, $headers);
            if ($mail_sent == TRUE)
            {
                //echo "ok";
                //header("Location: http://localhost/Facultate/Proiect/FoSo_framework/public/login",TRUE,303);
                header("Location: http://localhost/Facultate/Proiect/FoSo_framework/public/resetRedirect",TRUE,303);
            }
            else
            {
                header("Location: http://localhost/Facultate/Proiect/FoSo_framework/public/_404",TRUE,303);
            }

        } else {
            header("Location: http://localhost/Facultate/Proiect/FoSo_framework/public/forgot?userInexistent=t",TRUE,303);
        }




    }
}


?>