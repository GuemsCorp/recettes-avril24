<?php
require_once "Models/CategorieModel.php";
class HomeController{
    public function afficherPageAccueil(){
        $categories = CategorieModel :: getCategories();
        include 'Views/home.php';
    }
}