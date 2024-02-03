<?php
class PasswordChanger
{
    use Database;
    private $id_user;
    private $new_password;
    private $mysql;
    public function __construct($id_user)
    {
        $this->id_user = $id_user;
        $this->mysql = $this->connect();
    }
    public function changePassword()
    {
        $query = "UPDATE users set password='$this->new_password' where id=".$this->id_user;
        if (!($rez = $this->mysql->query ($query))) {
            die ('A survenit o eroare actualizarea parolei'); // view personalizat de eroare
        } else{
            $query = "DELETE FROM change_password where id_user=".$this->id_user;
            if (!($rez = $this->mysql->query ($query))) {
                die ('A survenit o eroare actualizare'); // view personalizat de eroare
            }
            header("Location: http://localhost/Facultate/Proiect/FoSo_framework/public/login",TRUE, 303);    
        }
    }
    public function checkMatch($p1, $p2){
        if($p1 == $p2){
            $this->new_password = password_hash($p1, PASSWORD_DEFAULT);;
            return 1;
        }
        return 0;
    }
    public function checkId(){  
        $query = 'select id_user from change_password';
        if (!($rez =  $this->mysql->query ($query))) {
            die ('A survenit o eroare la interogare'); // view personalizat de eroare
        }
        $ok = 0;
        while ($inreg = $rez->fetch_assoc()){
            if($inreg['id_user'] == $this->id_user)
            {
                $ok=1;
                break;
            }  
        }
        return $ok;

    }
}


?>