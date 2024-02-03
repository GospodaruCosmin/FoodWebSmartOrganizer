<?php

class Recipes extends Controller
{
    use Database;
    public function index(){
        
        $this->checkConnected();
        unset($_SESSION['searchProduct']);
        $data = $this -> sendReq();
        
        $content['images']['recipes'] = "<img class='popular-recipe' src='" . ROOT . "/assets/img/pizza-cropped.jpg'>";
        
        $mysql = $this->connect();
         
         //get image from recipe page
         $query = "SELECT image FROM images WHERE page = 'recipes'";
         $result = $mysql->query($query);
 
         if ($result && $result->num_rows > 0) {
             // Retrieve the image from the database
             $row = $result->fetch_assoc();
             $imageData = $row['image'];
 
             // Update the image in the $data array
             $content['images']['recipes'] = "<img class='popular-recipe' src='data:image/jpeg;base64," . base64_encode($imageData) . "' alt='Image' />";
            }
         



        if (is_object($data) && $data->number != 0) {
            $this->view('recipes','',$data,$content);
        }
        else $this->view('recipes','',-1,$content);  
    }



    public function sendReq(){


        if(isset($_GET['search-recipe']) && $_GET['search-recipe'] != null ){
            $_SESSION['searchRecipe']['searchQuery'] = $_GET['search-recipe'];
        } else if(isset($_GET['search-recipe']) && $_GET['search-recipe'] == null){
            $_SESSION['searchRecipe']['searchQuery'] = null;
        }
            
        if(isset($_GET['cuisine'])){
            $_SESSION['searchRecipe']['cuisines'] = $_GET['cuisine'];
        } else $_SESSION['searchRecipe']['cuisines'] = null;
        if(isset($_GET['type'])){
            $_SESSION['searchRecipe']['type'] = $_GET['type'];
        } else $_SESSION['searchRecipe']['type'] = null;
        if(isset($_GET['diets'])){
            $_SESSION['searchRecipe']['diets'] = $_GET['diets'];
        } else $_SESSION['searchRecipe']['diets'] = null;
        if(isset($_GET['intolerances'])){
            $_SESSION['searchRecipe']['intolerances'] = $_GET['intolerances'];
        } else $_SESSION['searchRecipe']['intolerances'] = null;
        
        if (
            isset($_SESSION['searchRecipe']['searchQuery']) && $_SESSION['searchRecipe']['searchQuery'] != null ||
            isset($_SESSION['searchRecipe']['cuisines']) && $_SESSION['searchRecipe']['cuisines'] != null ||
            isset($_SESSION['searchRecipe']['type']) && $_SESSION['searchRecipe']['type'] != null ||
            isset($_SESSION['searchRecipe']['diets']) && $_SESSION['searchRecipe']['diets'] != null ||
            isset($_SESSION['searchRecipe']['intolerances']) && $_SESSION['searchRecipe']['intolerances'] != null
        ){
            $queryParams = $_SESSION['searchRecipe'];

            if (isset($_SESSION['searchRecipe']['intolerances'])) {
                $queryParams['intolerances'] = implode(',', $_SESSION['searchRecipe']['intolerances']);
            }
            if (isset($_SESSION['searchRecipe']['diets'])) {
                $queryParams['diets'] = implode(',', $_SESSION['searchRecipe']['diets']);
            }
            if (isset($_SESSION['searchRecipe']['cuisines'])) {
                $queryParams['cuisines'] = implode(',', $_SESSION['searchRecipe']['cuisines']);
            }

            $queryString = http_build_query($queryParams);
            $url = 'http://localhost/Facultate/Proiect/Microservicii/API_Gateway.php?' . $queryString;
            $referer = "/recipes";
            $c = curl_init();
            curl_setopt($c, CURLOPT_URL, $url);
            curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($c, CURLOPT_REFERER, $referer);
            $res = curl_exec($c);

            curl_close($c);
            return json_decode($res);
        } else return -1;
       
    }
}

?>