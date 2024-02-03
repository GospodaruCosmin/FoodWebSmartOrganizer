<?php

class ClearShoppingList
{
    use Database;
    private $connect;
    private $id;
    public function __construct($email)
    {
        $this->id = $this->getID($email);
        $this->connect = $this->connect();
    }

    public function deleteItems()
    {
        $mysql = $this->connect();

        // Delete items from the shopping_list table
        $stmt = $mysql->prepare("DELETE FROM shopping_list WHERE idOwner = ?");
        $stmt->bind_param("i", $this->id);
        $success = $stmt->execute();
        $stmt->close();
    
        $mysql->close();
    
        if ($success) {
            return 1; // Successful deletion
        } else {
            return -1; // Failed deletion
        }
    }
}
?>