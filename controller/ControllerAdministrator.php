<?php
require_once File::build_path(array("model", "ModelUtilisateur.php"));

class ControllerAdministrator
{
    public static function viewAdmin()
    {
        require('view/administrator/adminView.php');  //"redirige" vers la vue detail
    }

    public static function deleteUserByAdmin()
    {
        $_SESSION['mailUser'] = $_POST['mail-delete'];
        $idPanier = ModelUtilisateur::getIdPanierByAdmin($_SESSION['mailUser']);
        ModelUtilisateur::deleteLignePanier($idPanier);
        ModelUtilisateur::deletePanier($idPanier);
        ModelUtilisateur::deleteCompteByAdmin($_SESSION['mailUser']);
        require('view/suppressionCompte/deteleOK.php');
    }

    public static function creationCompteParAdminView()
    {
        require('view/CreationCompte/creationCompteParAdminView.php');
    }

    public static function creationCompteParAdmin()
    {
        $mail = $_POST['mail'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mdp = $_POST['mdp'];
        ModelUtilisateur::createCompte($nom, $prenom, $mdp, $mail);
        $idUser2 = ModelUtilisateur::getidUserByMail($mail);
        ModelUtilisateur::createPanierUtilisateur($idUser2);
    }

    public static function creationProduitParAdmin()
    {   $_SESSION['nomCategorie'] = $_POST['decoration'] || $_POST['plage'] || $_POST['mode'];
        $nomProduit = $_POST['nomProduit'];
        $prixProduit = $_POST['prix'];
        $idCategorie = $_POST['idCategorie'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        ModelCategorie::getIdCategorieByName($_SESSION['nomCategorie']);
        ModelProduit::createProduit($nomProduit, $prixProduit, $idCategorie, $description, $image);
    }

    public static function viewCreationProduit()
    {
        require('view/gestion-produit/gestionProduit.php');
    }
}