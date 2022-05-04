<?php
require_once File::build_path(array("model","ModelProduit.php")); // chargement du modèle
class ControllerProduit {
    public static function readAll() {
        $tab_v = ModelProduit::getAllProduit();//appel au modèle pour gerer la BD
        require ('view/Produit/accueil.php');  //"redirige" vers la vue
    }
}