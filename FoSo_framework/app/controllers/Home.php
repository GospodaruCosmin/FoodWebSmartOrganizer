<?php


class Home extends Controller
{
    use Database;
    public function index(){
        
        $this->checkConnected();
        unset($_SESSION['searchProduct']);
        unset($_SESSION['searchRecipe']);
        $referer = "/home";
        $url = 'http://localhost/Facultate/Proiect/Microservicii/API_Gateway.php';
        
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_REFERER, $referer);
        $res = curl_exec($c);

        $resCode = curl_getinfo($c, CURLINFO_HTTP_CODE); // Get the response code

        curl_close($c);

        $content['images']['dashboard'] = "<img src='" . ROOT . "/assets/img/index-first.png'>";
        
        $mysql = $this->connect();
         
         //get image from recipe page
        $query = "SELECT image FROM images WHERE page = 'dashboard'";
        $result = $mysql->query($query);
 
        if ($result && $result->num_rows > 0) {
             // Retrieve the image from the database
             $row = $result->fetch_assoc();
             $imageData = $row['image'];
 
             // Update the image in the $data array
             $content['images']['dashboard'] = "<img src='data:image/jpeg;base64," . base64_encode($imageData) . "' alt='Image' />";
        }



        if($resCode != 200)
            header(
                "Location: http://localhost/Facultate/Proiect/FoSo_framework/public/_404",
                TRUE,
                303
            );
        else{
            $response = json_decode($res,true);
            //$response = 1;
            $this->view('home','',$response,$content);
        }
    }
}
