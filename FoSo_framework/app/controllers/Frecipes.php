<?php
class Frecipes extends Controller{
    public function index(){
        $this->checkConnected();

        $favourites = new Favourites();
        $data['products'] = $favourites->getFavProducts();
        $data['recipes'] = $favourites->getFavRecipes();

        $this->view('frecipe','',$data);
    }
}




?>