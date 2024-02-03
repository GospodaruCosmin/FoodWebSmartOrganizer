<?php
class InsertNewUser
{
    use Database;
    private $connect;

    public function __construct()
    {
        $this->connect = $this->connect();
    }

    public function registerUser()
    {
        $firstName = $_SESSION['firstName'];
        $lastName = $_SESSION['lastName'];
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];

        $this->insertUser($firstName, $lastName, $email, $password);
    }

    public function checkEmail()
    {
        return $this->checkMail($_SESSION['email']);
    }

    public function insertAllergy($email, $allergy)
    {
        $mysql = $this->connect();

        $userId = $this->getID($email);

        if ($userId === null) {
            return;
        }

        $stmt = $mysql->prepare("INSERT INTO allergies (id, allergy) VALUES (?, ?)");
        $stmt->bind_param("is", $userId, $allergy);
        $stmt->execute();

        $stmt->close();
        $mysql->close();
    }

    public function insertAllergies($allergies)
    {
        $email = $_SESSION['email'];
        foreach ($allergies as $allergy) {
            $this->insertAllergy($email, $allergy);
        }
    }
}
?>