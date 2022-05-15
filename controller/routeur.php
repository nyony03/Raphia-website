<?php

require_once File::build_path(array("controller", "ControllerProduit.php"));
require_once File::build_path(array("controller", "ControllerUtilisateur.php"));
// On recupère l'action passée dans l'URL

$action = $_GET["action"] ?? 'readAll';

// Appel de la méthode statique $action de ControllerVoiture
if ($action == 'readAll' || $action == 'readCategorie' || $action == 'ajoutProduitPanierSession') {
    ControllerProduit::$action();
}

if ($action == 'readConnexion' || $action == 'authentification' || $action == 'createAccount' || $action == 'deconnexion' || $action == 'creation' || $action == 'addProduit') {
    ControllerUtilisateur::$action();
}
