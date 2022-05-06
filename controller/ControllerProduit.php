<?php
require_once File::build_path(array("model","ModelProduit.php")); // chargement du modèle
class ControllerProduit {
    public static function readAll() {
        $tab_v = ModelProduit::getAllProduit();//appel au modèle pour gerer la BD
        require ('view/Produit/accueil.php');  //"redirige" vers la vue
    }



    public static function readCategorie(){
        $v = ModelProduit::getProduitByCat($_GET['nomCategorie']);
        if(empty($v)){
            require ('view/voiture/error.php'); //affiche erreur si la voiture n'existe pas
        }else{
            require ('view/voiture/detail.php');  //"redirige" vers la vue detail
        }
    }

}