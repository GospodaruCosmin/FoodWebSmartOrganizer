<?php
header('Content-Type: application/json; charset=utf-8');

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        //$api_key = '8d450f9bf9fa4007bf8bfab3ebebfa45';
        $api_key = 'd9da5314b03e4271a3f643cb583d0c11';

        $recipeInfoURL = "https://api.spoonacular.com/recipes/{$id}/information?apiKey={$api_key}&includeNutrition=true";
        $recipeInstructionsURL = "https://api.spoonacular.com/recipes/{$id}/analyzedInstructions?apiKey={$api_key}";

        $infoResponse = file_get_contents($recipeInfoURL);
        $instructionsResponse = file_get_contents($recipeInstructionsURL);

        if ($infoResponse) {
            $recipeInfo = json_decode($infoResponse, true);
            //echo "RecipeInformation:";

            if (!empty($recipeInfo)) {
                //echo json_encode($recipeInfo);
               $response['information'] = $recipeInfo;
            } else {
                http_response_code(404);
                echo "No information found.";
                exit;
            }
        } else {
            http_response_code(500); 
            echo "Cannot get information.";
            exit;
        }

        // if ($instructionsResponse) {
        //     $recipeInstructions = json_decode($instructionsResponse, true);
        //     //echo "RecipeInstructions:";

        //     if (!empty($recipeInstructions)) {
        //         $response['instructions']=$recipeInstructions;    
        //     } else {
        //         http_response_code(404);
        //         echo "No instructions found";
        //         exit;
        //     }
        // } else {
        //     http_response_code(500); 
        //     echo "Cannot get instructions.";
        //     exit;
        // }
    } else {
        http_response_code(400);
        echo "ID not provided.";
        exit;
    }
    
    echo json_encode($response);
} else {
    http_response_code(405); //in cazul in care cineva foloseste metoda gresita, setam la codul 405 = Method not Allowed si trimitem eroarea
    echo "Error: 405. Method not allowed";
    exit;
}

?>
