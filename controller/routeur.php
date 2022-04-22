<?php

require_once File::build_path(array("./view/produit","accueil.php"));
// On recupère l'action passée dans l'URL
$action = $_GET["action"];

if (!isset($action)){
    echo "Bienvenue sur mon super site de nap";

}
else {
// Appel de la méthode statique $action de ControllerVoiture
    ControllerProduit::$action();
}