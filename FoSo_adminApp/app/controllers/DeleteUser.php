<?php

class DeleteUser extends Controller{
    use Database;
    public function index(){
        $data = json_decode(file_get_contents('php://input'), true);
        $mysql = $this->connect();
        $id = $data['id'];

        $query = "DELETE from users WHERE id = ?";

        $stmt = $mysql->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "User deleted successfully.";
        } else {
            echo "Failed to delete user.";
        }

        $stmt->close();
        $mysql->close();
    }

}

?>