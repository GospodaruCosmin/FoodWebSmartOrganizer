<?php


class DeletePic extends Controller{
    use Database;
    public function index(){
        $data = json_decode(file_get_contents('php://input'), true);
        $type = $data['type'];

        // Perform the delete operation
        $mysql = $this->connect();
        $query = "DELETE FROM images WHERE page = ?";
        $stmt = $mysql->prepare($query);
        $stmt->bind_param("s", $type);
        $stmt->execute();
        $stmt->close();
        $mysql->close();

        // Return a response if needed
        echo "Delete operation done succesfully. Refresh page to see effect!";

    }
}