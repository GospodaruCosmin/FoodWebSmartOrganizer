<?php

class AdminMaker extends Controller{

    use Database;
    public function index(){
        $data = json_decode(file_get_contents('php://input'), true);
        
        $mysql = $this->connect();
        $id = $data['id'];

        $query = "UPDATE users SET admin = 1 WHERE id = ?";

        $stmt = $mysql->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "User updated successfully.";
        } else {
            echo "Failed to update user.";
        }

        $stmt->close();
        $mysql->close();

    }

}


?>