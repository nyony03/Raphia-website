<?php
session_start();
?>

<?php
require_once File::build_path(array("model","ModelPanier.php")); // chargement du modèle

class ControlleurPanier
{
    public static function readPanier($idUser)
    {
        //regarder si la session utilisateur contien un panier ou pas sinon on en lui creer un et on lui dit qu'il est vide
        //ou bien si son panier est vide
        if (!isset($_SESSION['panier']) or empty($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
            require('view/panierVide/panierVide.php'); //deriger vers la vue de panier vide

        } else {
            //l'utilisateur est connecté
            if (isset($_SESSION['nom'])) {
                //sa session contient un panier donc à voir si il est vide
                $_SESSION['panier'] = ModelPanier::getAllProduitDansPanierByUser($idUser);
                $panier = $_SESSION['panier'];

                //si il est vide on le rederige vers un panier
                if ($panier == false) {
                    require('view/panierVide/panierVide.php');//deriger vers la vue de panier vide

                } //sinon le rederiger vers la vu de son panier
                //sinon il regarde son panier
                else {
                    require('/view/panier/panier.php');
                }
            }
            //sinon il est juste pas connecté et on  le renvoie à son panier
            else{
                require('/view/panier/panier.php');

            }

        }
    }



}