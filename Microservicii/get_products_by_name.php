<?php
header('Content-Type: application/json; charset=utf-8');

if (isset($_GET['name'])) {
    $product_name = $_GET['name'];
    $offset = 10*$_GET['offset'];
    //$api_key = '8d450f9bf9fa4007bf8bfab3ebebfa45';
    $api_key = 'd9da5314b03e4271a3f643cb583d0c11';

    $url = "https://api.spoonacular.com/food/products/search?&query={$product_name}&apiKey={$api_key}&offset={$offset}";

    $response = file_get_contents($url);

    if ($response) {
        $productInfo = json_decode($response, true);

        if (!empty($productInfo) && isset($productInfo['products'])) {
            // foreach ($productInfo['products'] as $product) {
            //     echo json_encode($product);
            //     echo "\n";
            // }
            echo json_encode($productInfo);
        } else {
            http_response_code(404);
            echo "No information found.";
        }
    } else {
        http_response_code(500);
        echo "Cannot get information.";
    }
} else {
    http_response_code(400);
    echo "Name not provided.";
}


?>