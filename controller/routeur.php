<?php
require_once File::build_path(array("controller","ControlleurPanier.php"));
require_once File::build_path(array("controller","ControlleurCommande.php"));
// On recupère l'action passée dans l'URL
$action = $_GET["action"];
$attribut = $_GET["attribut"];

if (!isset($action)){
    echo "Bienvenue sur mon super site de nap";
    //à renvoyer vers la page erreur 
}
else {
// Appel de la méthode statique $action de ControllerVoiture
    if (!isset($attribut)){
        if ($action == 'readPanier') {
        ControlleurPanier::readPanier();
        }
        if($action == 'creatCommande'){
            ControlleurCommande::creatCommande();

        }
    }
    else {
        if ($action=="addQuantity") {
            ControlleurPanier::addQuantity((int)$attribut[0], (int)$attribut[1]);
        }
        if($action=="removeQuantity"){
            ControlleurPanier::removeQuantity((int)$attribut[0],(int)$attribut[1]);
        }


    }
}