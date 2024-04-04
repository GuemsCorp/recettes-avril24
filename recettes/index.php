<?php
session_start();
require_once 'Controllers/HomeController.php';
require_once 'Controllers/UserController.php';

$url = (isset($_GET['url'])) ? $_GET['url'] : 'home';

switch($url){

    case "home":
        $controller = new HomeController();
        $controller -> afficherPageAccueil();
        break;

    case "inscription":
        $controller = new UserController();
        $controller -> registerForm();
        break;
    case "register":// valide l'inscription
        $controller = new UserController();
        $controller -> register();
        break;
    case "connexion": // affiche le formulaire de connexion
        $controller = new UserController();
        $controller -> loginForm();
        break;
    case "login": //Valide le formulaire de connexion
        $controller = new UserController();
        $controller -> login();
        break;
    default:
        echo "404 not found !";
}