<?php
require_once File::build_path(array("model", "ModelUtilisateur.php")); // chargement du modèle

class ControllerUtilisateur
{

    public static function readConnexion()
    {
        require('view/connexion/connexion.php');
    }

    public static function authentification()
    {
        $mail = $_POST['mail'];
        $mdp =  $_POST['mdp'];
        var_dump($_POST);
        $tabUser = ModelUtilisateur::authentification($mail, $mdp);//appel au modèle pour gerer la BD

        require ('view/Produit/accueil.php');  //"redirige" vers la vue
    }
}