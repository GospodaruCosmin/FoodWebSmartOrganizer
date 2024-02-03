<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        //$apiKey = '8d450f9bf9fa4007bf8bfab3ebebfa45';
        $apiKey = 'd9da5314b03e4271a3f643cb583d0c11';

        $url = "https://api.spoonacular.com/recipes/{$id}/information?includeNutrition=false&apiKey={$apiKey}";
        
        $response = file_get_contents($url);
        
        if($response){
            $recipeInfo = json_decode($response, true);
            
            echo json_encode($recipeInfo);
        } else {
            http_response_code(500);//internal server error
            echo "Cannot get information.";
        }
    } else {
        http_response_code(400);//bad request
        echo "Error: 400. Recipe ID not provided.";
    }
} else {
    http_response_code(405); //in cazul in care cineva foloseste metoda gresita, setam la codul 405 = Method not Allowed si trimitem eroarea
    echo "Error: 405. Method not allowed";
    exit;
}

    
?>