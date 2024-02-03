<?php

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_SERVER['HTTP_REFERER'] == "/recipes") {
        $searchQuery = isset($_GET['searchQuery']) ? $_GET['searchQuery'] : '';
        $diets = isset($_GET['diets']) ? $_GET['diets'] : '';
        $cuisines = isset($_GET['cuisines']) ? $_GET['cuisines'] : '';
        $intolerances = isset($_GET['intolerances']) ? $_GET['intolerances'] : '';
        $type = isset($_GET['type']) ? $_GET['type'] : '';

        $url = 'http://localhost/Facultate/Proiect/Microservicii/complexSearchRecipes.php';
        $queryString = http_build_query([
            'searchQuery' => $searchQuery,
            'diets' => $diets,
            'cuisines' => $cuisines,
            'intolerances' => $intolerances,
            'type' => $type,
        ]);
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url . '?' . $queryString);              // stabilim URL-ul serviciului  
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);  // rezultatul cererii va fi disponibil ca șir de caractere
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false); // nu verificam certificatul digital
        $res = curl_exec($c);                           // executam cererea (se trimite via HTTP o cerere GET) 

        curl_close($c);
        echo $res;
    } else if ($_SERVER['HTTP_REFERER'] == "/recipe") {
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        if ($id == 'recipe') {
            http_response_code(400);
            exit;
        }

        $url = 'http://localhost/Facultate/Proiect/Microservicii/get_recipe_info_and_instructions_by_id.php';
        $queryString = http_build_query([
            'id' => $id,
        ]);

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url . '?' . $queryString);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        $res = curl_exec($c);
        $response = json_decode($res,true);
        curl_close($c);
        echo json_encode($response);
    } else if ($_SERVER['HTTP_REFERER'] == "/home") {
        $url = 'http://localhost/Facultate/Proiect/Microservicii/get_random_recipes.php';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        $res = curl_exec($c);
        $response = json_decode($res, true);
        curl_close($c);
        echo json_encode($response);
    } else if ($_SERVER['HTTP_REFERER'] == "/ingredient") {
        $id = isset($_GET['id]']) ? $_GET['id'] : '';

        $url = 'http://localhost/Facultate/Proiect/Microservicii/get_ingredient_by_id';
        $queryString = http_build_query([
            'id' => $id,
        ]);

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url . '?' . $queryString);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        $res = curl_exec($c);

        curl_close($c);
        echo $res;
    } else if ($_SERVER['HTTP_REFERER'] == "/products") { // de reverificat
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $offset = $_GET['offset'];
        $url = 'http://localhost/Facultate/Proiect/Microservicii/get_products_by_name.php';
        $queryString = http_build_query([
            'name' => $name,
            'offset' => $offset,
        ]);

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url . '?' . $queryString);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        $res = curl_exec($c);

        curl_close($c);
        echo $res;
    }else if($_SERVER['HTTP_REFERER'] == "/product"){
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $url = 'http://localhost/Facultate/Proiect/Microservicii/get_product_by_id.php?id='.$id;
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        $res = curl_exec($c);

        curl_close($c);
        echo $res;
    }else {
        http_response_code(421); // misdirected request
        echo "Error: 421. Unauthorized request.";
        exit;
    }
} else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    echo "am primit delete";
}
?>