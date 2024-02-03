<?php
class Addshoppinglist extends Controller
{
    use Database;
    public function index(){
        $referer = "/recipe";
        $id = basename($_SERVER['REQUEST_URI']);
        $url = 'http://localhost/Facultate/Proiect/Microservicii/API_Gateway.php?' . http_build_query(['id' => $id]);
        
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_REFERER, $referer);
        $res = curl_exec($c);

        $resCode = curl_getinfo($c, CURLINFO_HTTP_CODE);
        curl_close($c);
        if($resCode != 200)
            header(
                "Location: http://localhost/Facultate/Proiect/FoSo_framework/public/_404",
                TRUE,
                303
            );
        else{
            $response = json_decode($res,true);
            $items = [];

            foreach($response['information']['extendedIngredients'] as $ingrediente){
                $items[] = $ingrediente['originalName'];
            }

            $newUser = new InsertNewUser();
            if($newUser->insertItemsToShoppingList($items) == -1){
                header(
                    "Location: http://localhost/Facultate/Proiect/FoSo_framework/public/_404",
                    TRUE,
                    303
                );
            }
            else{
                header(
                    "Location: http://localhost/Facultate/Proiect/FoSo_framework/public/recipe/".$id,
                    TRUE,
                    303
                );
            }


        }
    }

}

?>