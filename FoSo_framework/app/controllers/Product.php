<?php
class Product extends Controller
{
    public function index(){
        //$this->view('product','',$response);
        $this->checkConnected();
        $referer = "/product";
        $id = basename($_SERVER['REQUEST_URI']);
        $url = 'http://localhost/Facultate/Proiect/Microservicii/API_Gateway.php?' . http_build_query(['id' => $id]);
        
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_REFERER, $referer);
        $res = curl_exec($c);

        $resCode = curl_getinfo($c, CURLINFO_HTTP_CODE); // Get the response code

        curl_close($c);
        if($resCode != 200)
            header(
                "Location: http://localhost/Facultate/Proiect/FoSo_framework/public/_404",
                TRUE,
                303
            );
        else{
            $response = json_decode($res,true);
            $this->view('product','',$response);
            //var_dump($response);
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