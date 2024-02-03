<?php

class ClearList extends Controller{
    public function index(){
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $requestBody = file_get_contents('php://input');
            $data = json_decode($requestBody, true);
            
            //echo "am primit " . $data['userConn'];
            $clear = new ClearShoppingList($data['userConn']);
            if($clear->deleteItems()==-1){
                http_response_code(500);
                echo "Error while trying to access database.";
            } else echo "Succes";

        }else if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $newGetShoppingList = new GetShoppingList();
            $items = $newGetShoppingList->getItems();

            
            $jsonData = json_encode($items);

            // Specify the file path and name
            $filePath = 'C:/Users/teomi/Desktop/importedShoppingList.json';

            // Write the JSON data to the file
            $file = fopen($filePath, 'w');
            fwrite($file, $jsonData);
            fclose($file);
        }else {
            http_response_code(405); // Set the response status code to 405 Method Not Allowed
            echo "Invalid request method. Expected DELETE.";
        }
    }
}

?>