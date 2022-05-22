<?php
require_once File::build_path(array("model","ModelCommande.php")); // chargement du modèle
require_once File::build_path(array("model","ModelPanier.php")); // chargement du modèle

class ControlleurCommande
{
    public static function creatCommande(){
        if (!isset($_SESSION['idUser'])){
            require ('view/connexion/connexion.php');
        }
        else{
            ModelCommande::creatCommande();
            ModelCommande::createLignesCommandes();
            ModelPanier::deleteAllPanier();
        }
    }
}