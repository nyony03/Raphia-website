<?php
require_once File::build_path(array("model", "ModelUtilisateur.php"));

class ControllerAdministrator
{
    public static function viewAdmin()
    {
        if(isset($_SESSION['nom']))
        {
            require('view/administrator/adminView.php');  //"redirige" vers la vue detail
        }
    }

    public static function deleteUserByAdmin(){
        $_SESSION['mailUser'] = $_POST['mail-delete'];
        $idPanier = ModelUtilisateur::getIdPanierByAdmin($_SESSION['mailUser']);
        if((ModelUtilisateur::getidUserByMail($_SESSION['mailUser'])) !== null)
        {
            ModelUtilisateur::deleteLignePanier($idPanier);
            ModelUtilisateur::deletePanier($idPanier);
            ModelUtilisateur::deleteCompteByAdmin($_SESSION['mailUser']);
            require('view/suppressionCompte/deteleOK.php');
        }

    }

    public static function creationCompteParAdminView(){
        require('view/CreationCompte/creationCompteParAdminView.php');
    }

    public static function creationProduitParAdmin(){
        require ('view/gestionProduit/creationProduitParAdmin.php');
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
}