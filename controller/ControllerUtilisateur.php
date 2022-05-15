<?php
require_once File::build_path(array("model", "ModelUtilisateur.php")); // chargement du modèle
require_once File::build_path(array("controller", "ControllerProduit.php")); // chargement du modèle
require_once File::build_path(array("model", "ModelProduit.php"));
require_once File::build_path(array("model", "ModelPanier.php"));

class ControllerUtilisateur
{

    public static function readConnexion()
    {
        require('view/connexion/connexion.php');
    }

    public static function createAccount()
    {
        require('view/CreationCompte/creationCompte.php');
    }

    public static function authentification()
    {
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        ModelUtilisateur::authentification($mail, $mdp);//appel au modèle pour gerer la BD
        $_SESSION['idPanier'] = ModelPanier::getIdPanierByIdUser($_SESSION['idUser']);
        $panier = ModelPanier::getAllProduitDansPanierByUser($_SESSION['idUser']);
        var_dump($panier);
        //require('view/Produit/accueil.php');  //"redirige" vers la vue
    }

    public static function creation()
    {
        $mail = $_POST['mail'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mdp = $_POST['mdp'];
        ModelUtilisateur::createCompte($nom, $prenom, $mdp, $mail);
        $idUser = ModelUtilisateur::getidUserByMail($mail);
        ModelUtilisateur::createPanierUtilisateur($idUser);
        $_SESSION['idPanier'] = ModelPanier::getIdPanierByIdUser($idUser);
    }

    public static function deconnexion()
    {
        ModelUtilisateur::deconnexion();
    }

    public static function addProduit()
    {
        if (isset($_SESSION['panier'][$_GET['idProduit']])) {
            $_SESSION['panier'][$_GET['idProduit']]++;
        } else {
            $_SESSION['panier'][$_GET['idProduit']] = 1;
        }

        if (isset($_SESSION['idPanier'])) {  // si connecté synchronisation avec la db
            ControllerProduit::ajoutProduitPanierSession();
        }

        $_SESSION['panier_qte'] = 0;
        foreach ($_SESSION['panier'] as $qte) {
            $_SESSION['panier_qte'] += $qte;
        }

        header("Location: ../raphia");
    }
}