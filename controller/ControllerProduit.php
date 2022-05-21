<?php
require_once File::build_path(array("model", "ModelProduit.php")); // chargement du modèle
require_once File::build_path(array("model", "ModelCategorie.php")); // chargement du modèle

class ControllerProduit
{
    public static function readAll()
    {
        $tab_v = ModelProduit::getAllProduit();//appel au modèle pour gerer la BD
        $tab_cat = ModelCategorie::getAllNameCategorie(); //appel au modele catégorie
        require('view/produit/accueil.php');  //"redirige" vers la vue
    }


    public static function readCategorie()
    {
        $tab_detail = ModelProduit::getProduitByCat($_GET['nomCategorie']);
        $tab_cat = ModelCategorie::getAllNameCategorie(); //appel au modele catégorie
        require('view/produit/detail.php');  //"redirige" vers la vue detail
    }

    public static function ajoutProduitPanierSession()
    {
        if ($_SESSION['panier'][$_GET['idProduit']] == 1) {
            ModelProduit::createLignePanier($_SESSION['idPanier'], $_GET['idProduit']);
        } else {
            ModelProduit::ajouterQuantiteProduit($_SESSION['idPanier'],  $_GET['idProduit']);
        }
    }


}