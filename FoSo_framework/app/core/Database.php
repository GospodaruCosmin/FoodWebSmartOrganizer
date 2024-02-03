<?php

trait  Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'FoSo';

    protected function connect()
    {
        $mysqli = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($mysqli->connect_error) {
            die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }
        return $mysqli;
    }

    public function insertUser($firstName, $lastName, $email, $password)
    {
        $mysql = $this->connect();

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $mysql->prepare("INSERT INTO users (first_name, last_name, email_address, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $hashedPassword);

        $stmt->execute();
        $stmt->close();
    }

    public function checkMail($email)
    {
        $mysql = $this->connect();

        $stmt = $mysql->prepare("SELECT COUNT(*) as count FROM users WHERE email_address = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $count = $row['count'];

        $stmt->close();

        if ($count > 0) {
            return -1; // exista
        } else {
            return 1; // e ok
        }
    }

    public function getID($email)
    {
        $mysql = $this->connect();

        $stmt = $mysql->prepare("SELECT id FROM users WHERE email_address = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $stmt->close();

        if ($row > 0) {
            return $row['id'];
        } else {
            return null;
        }
    }

    public function insertAllergy($email, $allergy)
    {
        $mysql = $this->connect();

        $userID = $this->getID($email);
        if ($userID == null) {
            return;
        }

        $stmt = $mysql->prepare("INSERT INTO allergies (id, allergy) VALUES (?, ?)");
        $stmt->bind_param("is", $userID, $allergy);
        $stmt->execute();

        $stmt->close();
    }

    public function insertItemsToShoppingList($items){
        $mysql = $this -> connect();

        $email = $_COOKIE['userConn'];
        $userID = $this -> getID($email);

        if ($userID == null) {
            return -1;
        }

        // $stmt = $mysql -> prepare("INSERT INTO shopping_list (idOwner, item) VALUES (?, ?)");
        foreach ($items as $item){
            $stmt = $mysql -> prepare("INSERT INTO shopping_list (item, idOwner) VALUES (?, ?)");
            $stmt -> bind_param("si", $item, $userID);
            if(!$stmt -> execute()){
                return -1;
            }
        }

        $stmt->close();
        return 1;
    }
}

?>