<?php

class RequestRecipe {

    private $cuisine = null;
    private $type = null;
    private $intolerances = null;
    private $diet = null;
    private $minCal = null;
    private $maxCal = null;

    public function __construct() {
        // if (isset($_SESSION['requestRecipe'])) {
        //     $this->loadFromSession();
        // } else {
            $this->initializeFromGet();
        
    }

    private function initializeFromGet() {
        if (isset($_GET['type'])) {
            $this->type = $_GET['type'];
        }
        if (isset($_GET['cuisine'])) {
            $this->cuisine = $_GET['cuisine'];
        }
        if (isset($_GET['diets'])) {
            $this->diet = $_GET['diets'];
        }
        if (isset($_GET['intolerances'])) {
            $this->intolerances = $_GET['intolerances'];
        }
        if ($_GET['min-cal'] != null) {
            $this->minCal = $_GET['min-cal'];
        }
        if ($_GET['max-cal'] != null) {
            $this->maxCal = $_GET['max-cal'];
        }

        $this->saveToSession();
    }

    private function loadFromSession() {
        $request = $_SESSION['requestRecipe'];

        $this->searchQuery = $request->searchQuery;
        $this->cuisine = $request->cuisine;
        $this->type = $request->type;
        $this->intolerances = $request->intolerances;
        $this->diet = $request->diet;
        $this->minCal = $request->minCal;
        $this->maxCal = $request->maxCal;
    }

    private function saveToSession() {
        $_SESSION['requestRecipe'] = $this;
    }
    public function getFilters(){
        return $this->searchQuery." ".$this->cuisine;
    }
}

?>