<?php
require_once File::build_path(array("model", "ModelUtilisateur.php")); // chargement du modèle

class ControllerUtilisateur
{

    public static function readConnexion()
    {
        require('view/connexion/connexion.php');
    }

    public static function createAccount()
    {
        require('view/formulaireCreationCompte/creationCompte.php');
    }

    public static function authentification()
    {
        $mail = $_POST['mail'];
        $mdp =  $_POST['mdp'];
        $tabUser = ModelUtilisateur::authentification($mail, $mdp);//appel au modèle pour gerer la BD
        require ('view/Produit/accueil.php');  //"redirige" vers la vue
    }

    public static function creation()
    {
        $mail = $_POST['mail'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mdp = $_POST['mdp'];
        ModelUtilisateur::createCompte($nom, $prenom, $mdp, $mail);


    }

    public static function deconnexion()
    {
        ModelUtilisateur::deconnexion();
    }
}