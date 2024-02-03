<?php


class ShoppingList extends Controller
{
    public function index()
    {

        $this->checkConnected();

        $newGetShoppingList = new GetShoppingList();
        //var_dump($newGetShoppingList->getItems());


        $this->view('shoppingList','',$newGetShoppingList->getItems());
    }
}