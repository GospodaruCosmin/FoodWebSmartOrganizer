<?php
header('Content-Type: application/json; charset=utf-8');

 //$apiKey = '8d450f9bf9fa4007bf8bfab3ebebfa45';
$apiKey = 'd9da5314b03e4271a3f643cb583d0c11';
 // setam URL-ul pentru API
 $url = 'https://api.spoonacular.com/recipes/complexSearch';
$params = [];
if($_GET['diets'] != null){
    $params['diet'] = $_GET['diets'];
}
if($_GET['intolerances'] != null)
{
   $params['intolerances'] = $_GET['intolerances'];
}
if($_GET['type']!= null){
    $params['type'] = $_GET['type'];
}
if($_GET['cuisines']!= null){
    $params['cuisine'] = $_GET['cuisines'];
}
if($_GET['searchQuery'] != null){
    $params['includeIngredients'] = $_GET['searchQuery'];
}
$params['apiKey'] = $apiKey;
$params['number'] = 10;
$query = http_build_query($params);
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url . '?' . $query); // concatenam URL-ul cu parametrii pentru a rezulta URL-ul complet 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

curl_close($ch);

echo $response;

?>