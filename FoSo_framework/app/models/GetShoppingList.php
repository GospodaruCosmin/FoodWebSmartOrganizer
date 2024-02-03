<?php

class GetShoppingList
{
    use Database;
    private $connect;

    public function __construct()
    {
        $this->connect = $this->connect();
    }

    public function getItems()
    {
        $mysql = $this->connect();

        $email = $_COOKIE['userConn'];
        $id = $this->getID($email);

        $stmt = $mysql->prepare("SELECT item FROM shopping_list where idOwner = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $items = array();

        while ($row = $result->fetch_assoc()) {
            $items[] = $row['item'];
        }

        $stmt->close();
        $mysql->close();

        return $items;
    }
}