<?php
class DeleteFromFav extends Controller{

    use Database;
    public function index(){
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        if($data['type'] == 2){
            $this->deleteRecipe($data['id']);
        } else if($data['type'] == 1){
            $this->deleteProduct($data['id']);
        }
    }
    public function deleteProduct($idProduct){
        $mysql = $this->connect();

        $email = $_COOKIE['userConn'];
        $id = $this->getID($email);

        $query = "DELETE from saved_products WHERE idProduct = ? AND  idOwner = ?";

        $stmt = $mysql->prepare($query);
        $stmt->bind_param("ii", $idProduct,$id);

        if ($stmt->execute()) {
            echo "Product deleted successfully.";
        } else {
            echo "Failed to delete product.";
        }

        $stmt->close();
        $mysql->close();
    }
    public function deleteRecipe($idRecipe){
        $mysql = $this->connect();

        $email = $_COOKIE['userConn'];
        $id = $this->getID($email);

        $query = "DELETE from saved_recipes WHERE idRecipe = ? AND  idOwner = ?";

        $stmt = $mysql->prepare($query);
        $stmt->bind_param("ii", $idRecipe,$id);

        if ($stmt->execute()) {
            echo "Recipe deleted successfully.";
        } else {
            echo "Failed to delete recipe.";
        }

        $stmt->close();
        $mysql->close();
    }


}


?>