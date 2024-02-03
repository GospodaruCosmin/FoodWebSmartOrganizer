<?php

class Favourites{
    use Database;
    private $connect;
    private $id;
    public function __construct()
    {
        $this->connect = $this->connect();
        $email = $_COOKIE['userConn'];
        $this->id = $this->getID($email);
    }
    public function getFavProducts(){
        $mysql = $this->connect();
        $stmt = $mysql->prepare("SELECT idProduct,name,image FROM saved_products where idOwner = ?");
        $stmt->bind_param("i", $this->id);
        $stmt->execute();

        $result = $stmt->get_result();
        $items = array();

        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
        return $items;

    }
    public function getFavRecipes(){
        $mysql = $this->connect();
        $stmt = $mysql->prepare("SELECT idRecipe,name,image FROM saved_recipes where idOwner = ?");
        $stmt->bind_param("i", $this->id);
        $stmt->execute();

        $result = $stmt->get_result();
        $items = array();

        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
        return $items;

    }


}

?>