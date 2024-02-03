<?php
header('Content-Type: text/html; charset=utf-8');

class SaveRecipe extends Controller
{
    use Database;

    public function index()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $email = $_COOKIE['userConn'];
        $id = $this->getID($email);

        $mysql = $this->connect();

        $stmt = $mysql->prepare("INSERT INTO saved_recipes (idOwner, idRecipe, name, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $id, $data['recipeId'], $data['title'], $data['image']);

        $stmt->execute();

        // !!!!!!!!!
        // $newstmt = $mysql -> prepare("SELECT image FROM saved_recipes WHERE idRecipe = ?");
        // $newstmt->bind_param("i", $data['recipeId']);

        // $newstmt->execute();

        // $newstmt->bind_result($a);
        // while($newstmt->fetch()){
        //     echo urldecode($a);
        // }


        $row = $stmt->affected_rows;
        if ($row > 0) {
            echo "Saved";
        } else {
            echo "Failed to save";
        }

        // echo $data['image'];
        // echo strlen($data['image']);

        $stmt->close();

        $mysql->close();
    }
}