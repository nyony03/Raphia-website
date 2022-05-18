<?php
//require_once File::build_path(array("model","Model.php")); // chargement du modèle
//require_once File::build_path(array("model","ModelPanier.php")); // chargement du modèle

class ControlleurPanier
{

    public static function readPanier()
    {
        //echo '<p>Fonction rentre dans read Panier</p>';

        $_SESSION['nom'] = "nadal";
        $_SESSION['panier'] = [];



        //regarder si la session utilisateur contien un panier ou pas sinon on en lui creer un et on lui dit qu'il est vide
        //ou bien si son panier est vide
      if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
            require('view/panierVide/panierVide.php'); //deriger vers la vue de panier vide

        } else {
            //l'utilisateur est connecté
            if (isset($_SESSION['nom'])) {
                //require_once File::build_path(array("model","Model.php")); // chargement du modèle
                //require_once File::build_path(array("model","ModelPanier.php")); // chargement du modèle
                //sa session contient un panier donc à voir si il est vide


                array_push($_SESSION['panier'],ModelPanier::getAllProduitDansPanierByUser(31));//idUser recuperé à la connexion

                $panier = $_SESSION['panier'];
                //si il est vide on le rederige vers un panier
                if (ModelPanier::getAllProduitDansPanierByUser(31) == false) {
                    require('view/panierVide/panierVide.php');//deriger vers la vue de panier vide

                } //sinon le rederiger vers la vu de son panier
                //sinon il regarde son panier
                else {
                    require('view/panier/panier.php');
                }
            }
            //sinon il est juste pas connecté et on  le renvoie à son panier
            else{
                require('view/panier/panier.php');

            }

        }
   }

   public static function addQuantity($idProduit,$idPanier){


       ModelPanier::addInLignePanier($idProduit,$idPanier);
       echo '<body onload="location.href=\'index.php?action=readPanier\'"></body>';




   }
    public static function removeQuantity($idProduit,$idPanier){


        ModelPanier::removeInLignePanier($idProduit,$idPanier);
        echo '<body onload="location.href=\'index.php?action=readPanier\'"></body>';




    }

    public static function deleteProductFromPanier($idProduit,$idPanier)
    {

        ModelPanier::deleteFromLignePanier($idProduit, $idPanier);
        echo '<body onload="location.href=\'index.php?action=readPanier\'"></body>';


    }

    }