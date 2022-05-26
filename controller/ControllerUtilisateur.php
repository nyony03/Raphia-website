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

    //supprimer compte
    public static function deleteCompte()
    {

        ModelUtilisateur::deleteCommande($_SESSION['idUser']);
        ModelUtilisateur::deleteLigneCommande($_SESSION['idUser']);
        ModelUtilisateur::deleteLignePanier($_SESSION['idPanier']);
        ModelUtilisateur::deletePanier($_SESSION['idPanier']);
        ModelUtilisateur::deleteCompte($_SESSION['idUser']);



        require('view/suppressionCompte/deteleOK.php');
        session_destroy();
    }

    public static function authentification()
    {
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        $tabUser = ModelUtilisateur::authentification($mail, $mdp);//appel au modèle pour gerer la BD
        if(isset($tabUser)){
            self::mergeSession();
            header("Location: ../raphia"); //"redirige" vers la vue
            $_SESSION['idAdmin'] = ModelUtilisateur::getIdAdminByIdUser($_SESSION['idUser']);

        }else{
            require('view/connexion/connexionError.php');
        }


    }

    public static function mergeSession(){
        $panier = $_SESSION['panier'];
        foreach ($panier as $produit) {
            $idProd = $produit['idProduit'];
            $qte = $produit['qte'];
            $_SESSION['panier'][$idProd] = $qte;
            $_SESSION['panier_qte'] = $qte;
        }

        if(isset($_SESSION['idUser'])){
            $_SESSION['idPanier'] = ModelPanier::getIdPanierByIdUser($_SESSION['idUser']);

            if (isset($_SESSION['panier'])) {
                ModelPanier::mergePanierSessionDb();
            }

            $panier = ModelPanier::getLignePanierByIdUser($_SESSION['idUser']);
            $_SESSION['panier'] = $panier;


            foreach ($_SESSION['panier'] as $qte) {
                $_SESSION['panier_qte'] += $qte;
            }
        }
    }

    public static function creation()
    {
        $mail = $_POST['mail'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mdp = $_POST['mdp'];
        ModelUtilisateur::createCompte($nom, $prenom, $mdp, $mail);
        $idUser = ModelUtilisateur::getidUserByMail($mail);
        $_SESSION['idUser'] = $idUser;
        ModelUtilisateur::createPanierUtilisateur($idUser);
        $_SESSION['idPanier'] = ModelPanier::getIdPanierByIdUser($idUser);
        $_SESSION['prenom'] = $prenom;
        $_SESSION['nom'] = $nom;
        $_SESSION['mdp'] = $mdp;
    }

    public static function modificationView()
    {
        require('view/modificationCompte/modificationCompte.php');
    }

    public static function modificationCompte()
    {
        $new_name = $_POST['newName'] ?? $_SESSION['nom'];
        $new_surname = $_POST['newSurname'] ?? $_SESSION['prenom'];
        $new_mdp = $_POST['newMDP'] ?? $_SESSION['mdp']; //à revoir
        $last_mdp = $_POST['lastMDP'];
        if($new_mdp == $last_mdp){
            require('view/modificationCompte/errorCreate.php');
        }else{
            ModelUtilisateur::modifyCompte($_SESSION['idUser'], $new_name, $new_surname, $new_mdp);
        }

    }

    public static function deconnexion()
    {
        ModelUtilisateur::deconnexion();
    }

    public static function addProduit()
    {
        if (isset($_SESSION['panier'][$_GET['idProduit']])) {
            $_SESSION['panier'][$_GET['idProduit']]['qte']++;
        } else {
            $_SESSION['panier'][$_GET['idProduit']]['qte'] = 1;
        }
        if (isset($_SESSION['idPanier'])) {  // si connecté synchronisation avec la db
            ControllerProduit::ajoutProduitPanierSession();
        }
        $_SESSION['panier_qte'] = 0;
        foreach ($_SESSION['panier'] as $produit) {
            $_SESSION['panier_qte'] += $produit['qte'];
        }

        header("Location: ../raphia");
    }

}