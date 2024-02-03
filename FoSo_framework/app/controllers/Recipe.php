<?php

//header('Content-Type: application/json; charset=utf-8');

class Recipe extends Controller
{
    public function index(){
        
        $this->checkConnected();
        unset($_SESSION['searchRecipe']);
        unset($_SESSION['searchProduct']);
        $referer = "/recipe";
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
            $response['nutrienti'] = $this->extractNutrients($response['information']['nutrition']['nutrients']);
            $response['id_reteta'] = $id;
            $this->view('recipe','',$response);
        }
        
    }
    public function extractNutrients($nutrientsAll){
        $response = [];
        foreach($nutrientsAll as $nutrient){
            if($nutrient['name']=='Calories'){
                $response['Calories']=$nutrient['amount'];
            }else if($nutrient['name']=='Fat'){
                $response['Fat']=$nutrient['amount'];
            }else if($nutrient['name']=='Sugar'){
                $response['Sugar']=$nutrient['amount'];
            }else if($nutrient['name'] == 'Protein'){
                $response['Protein']=$nutrient['amount'];
            }else if($nutrient['name']=='Fiber'){
                $response['Fiber']=$nutrient['amount'];
            }
        }
        return $response;
    }
    
}
?>