<?php

class Decrement extends Controller{

public function index(){
    $number = $_SESSION['offsetProducts'];
    if($number - 1 >= 1)
        $_SESSION['offsetProducts'] = $number - 1;
    
    header(
        "Location: http://localhost/Facultate/Proiect/FoSo_framework/public/products?offset=". $_SESSION['offsetProducts'],
        TRUE,
        303
    );
}


}


?>