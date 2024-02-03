<?php
class Products extends Controller
{
    use Database;
    public function index(){
        $this->checkConnected();
        unset($_SESSION['searchRecipe']);

        $content['images']['products'] = "<img class='popular-recipe' src='" . ROOT . "/assets/img/products2.jpg'>";
        
        $mysql = $this->connect();
         
         //get image from recipe page
        $query = "SELECT image FROM images WHERE page = 'products'";
        $result = $mysql->query($query);
 
        if ($result && $result->num_rows > 0) {
             // Retrieve the image from the database
             $row = $result->fetch_assoc();
             $imageData = $row['image'];
 
             // Update the image in the $data array
             $content['images']['products'] = "<img class='popular-recipe' src='data:image/jpeg;base64," . base64_encode($imageData) . "' alt='Image' />";
        }


        if(isset($_GET['product'])){
            $_SESSION['searchProduct'] = $_GET['product'];
            $_SESSION['offsetProducts'] = 1;
            $response = $this->sendReq($_SESSION['searchProduct']);
            $this->view('products','',$response,$content);
        } else if(isset($_SESSION['searchProduct'])){
            $response = $this->sendReq($_SESSION['searchProduct']);
            $this->view('products','',$response,$content);
        }
        else{
            $_SESSION['offsetProducts'] = 1;
            $this->view('products','','',$content);
        }
            
    }
    public function sendReq($product){
        $name = $product;
        $url = 'http://localhost/Facultate/Proiect/Microservicii/API_Gateway.php?name=' . $name .'&offset='.$_SESSION['offsetProducts'];
        $referer = "/products";
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_REFERER, $referer);
        $res = curl_exec($c);

        curl_close($c);
        return json_decode($res,true);
    }
}

?>