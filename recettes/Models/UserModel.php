<?php
require_once "Core/Connect.php";
class UserModel{
    //affichage du formulaire d'inscription
    public static function register(){
        $db = Connect::dbConnect();
        $cryptedPassword = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        //preparer la requête
        $request = $db->prepare(("INSERT INTO users (nom, prenom,  email, mdp) VALUES (?,?,?,?)"));
        //executer la requête
        $request->execute((array($_POST['nom'],$_POST['prenom'], $_POST['email'], $cryptedPassword)));
    }
    // pour la connexion
    public static function login(){
        $db = Connect::dbConnect();
        $request = $db->prepare("SELECT * FROM users WHERE email = ?");
        $request ->execute((array($_POST['email'])));
        $user = $request->fetch();
        return $user;
    }
}