<?php
class Import extends Controller
{
    public function index(){
        $this->checkConnected();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['fileUpload'])) {
              $file = $_FILES['fileUpload'];
          

              $fileName = $file['name'];
              $fileTmpPath = $file['tmp_name'];
          
              $destination = 'C:/xampp/htdocs/Facultate/Proiect/FoSo_framework/public/assets/files/' . $fileName;
              move_uploaded_file($fileTmpPath, $destination);
              $jsonData = file_get_contents($destination);
              if (file_exists($destination)) {
                if (unlink($destination)) { // delete file after i m done with json info
                  echo 'File deleted successfully.';
                }
              }
              $arrayData = json_decode($jsonData, true);
              $newUser = new InsertNewUser();
            if($newUser->insertItemsToShoppingList($arrayData) == -1){
                
                header(
                    "Location: http://localhost/Facultate/Proiect/FoSo_framework/public/_404",
                    TRUE,
                    303
                );
            } else{
                header(
                    "Location: http://localhost/Facultate/Proiect/FoSo_framework/public/shoppingList",
                    TRUE,
                    303
                );
            } 
          
              echo 'File uploaded successfully!';
            }
        
        } else 
            $this->view('import');
    }

}


?>