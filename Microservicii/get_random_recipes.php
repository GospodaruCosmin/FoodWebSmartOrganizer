<?php
header('Content-Type: application/json; charset=utf-8');
//$api_key = '8d450f9bf9fa4007bf8bfab3ebebfa45';
$api_key = 'd9da5314b03e4271a3f643cb583d0c11';

$url = "https://api.spoonacular.com/recipes/random?number=6&apiKey={$api_key}";

$response = file_get_contents($url);

if ($response) {
    $randomRecipes = json_decode($response, true);

    //if (!empty($randomRecipes['recipes'])) {
        //foreach ($randomRecipes['recipes'] as $recipe) {
    echo json_encode($randomRecipes); // daca vrem sa afisam tot json-ul
            // SAU 

            // echo "Recipe ID: {$recipe['id']}<br>";
            // echo "Title: {$recipe['title']}<br>";
            // echo "Servings: {$recipe['servings']}<br>";
            // echo "Ready in Minutes: {$recipe['readyInMinutes']}<br>";
            // echo "Image: <img src='{$recipe['image']}' alt='Recipe Image'><br>";
            // echo "<br>";
        //}
    //}
}

?>