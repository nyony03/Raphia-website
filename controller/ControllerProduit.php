
<?php
require_once File::build_path(array("model","ModelProduit.php")); // chargement du modèle
class ControllerProduit
{
    public static function readAllproduit() {
        $tab_v = ModelProduit::getAllProduit();     //appel au modèle pour gerer la BD
        require ('view/produit/accueil.php');  //"redirige" vers la vue
    }
}