<?php

require_once File::build_path(array("controller", "ControllerProduit.php"));
require_once File::build_path(array("controller", "ControllerUtilisateur.php"));
require_once File::build_path(array("controller", "ControllerAdministrator.php"));
require_once File::build_path(array("controller", "ControllerPanier.php"));
require_once File::build_path(array("controller", "ControlleurCommande.php"));
// On recupère l'action passée dans l'URL

$action = $_GET["action"] ?? 'readAll';
$attribut = $_GET["attribut"] ?? '';


// Appel de la méthode statique $action de ControllerVoiture
if ($action == 'readAll' || $action == 'readCategorie' || $action == 'ajoutProduitPanierSession') {
    ControllerProduit::$action();
}

if ($action == 'readConnexion' || $action == 'authentification' || $action == 'createAccount' || $action == 'deconnexion' || $action == 'creation' || $action == 'addProduit' || $action == 'modificationCompte' || $action == 'modificationView' || $action == 'deleteCompte') {
    ControllerUtilisateur::$action();
}

if (isset($_SESSION['idUser'])) {
    if ($action == 'viewAdmin' || $action == 'deleteUserByAdmin' || $action == 'creationCompteParAdminView' || $action == 'creationCompteParAdmin' || $action == 'creationProduitParAdmin') {
        ControllerAdministrator::$action();
    }
}


if (!isset($action)) {
    echo "Bienvenue sur mon super site de nap";
    //à renvoyer vers la page erreur
} else {
// Appel de la méthode statique $action de ControllerVoiture
    if (!$attribut) {
        if ($action == 'readPanier') {
            ControllerPanier::readPanier();
        }
        if ($action == 'creatCommande') {
            ControlleurCommande::creatCommande();
        }
    } else {
        if ($action == "addQuantity") {
            ControllerPanier::addQuantity((int)$attribut[0], (int)$attribut[1]);
        }
        if ($action == "removeQuantity") {
            ControllerPanier::removeQuantity((int)$attribut[0], (int)$attribut[1]);
        }
        if ($action == 'addQuantitySession') {
            ControllerPanier::addQuantitySession($attribut[0]);
        }
        if ($action == 'removeQuantitySession') {
            ControllerPanier::removeQuantitySession($attribut[0]);
        }
    }
}

