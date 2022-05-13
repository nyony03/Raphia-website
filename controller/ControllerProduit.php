<?php
require_once File::build_path(array("model","ModelProduit.php")); // chargement du modèle
require_once File::build_path(array("model","ModelCategorie.php")); // chargement du modèle

class ControllerProduit {
    public static function readAll() {
        $tab_v = ModelProduit::getAllProduit();//appel au modèle pour gerer la BD
        $tab_cat = ModelCategorie::getAllNameCategorie(); //appel au modele catégorie
        require ('view/Produit/accueil.php');  //"redirige" vers la vue
    }


    public static function readCategorie(){
        $tab_detail = ModelProduit::getProduitByCat($_GET['nomCategorie']);
        $tab_cat = ModelCategorie::getAllNameCategorie(); //appel au modele catégorie
        require ('view/Produit/detail.php');  //"redirige" vers la vue detail
    }

    public static function ajoutProduitPanierSession(){
        $idPanier = $_SESSION['idPanier'] ?? null;
        if (!$idPanier) {
            $_SESSION['idPanier'] = ModelProduit::createPanier($_GET['idProduit']);
        } else {
            ModelProduit::ajouterQuantiteProduit($idPanier);
        }

        // redirection, prendre categori pr redirection mm page
    }
}