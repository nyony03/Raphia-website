<?php

require_once File::build_path(array("model", "Model.php")); // chargement du modèle
require_once File::build_path(array("model", "ModelPanier.php")); // chargement du modèle

class ControllerPanier
{

    public static function readPanier()
    {
        if (!isset($_SESSION['panier'])) {
            require('view/panierVide/panierVide.php'); //deriger vers la vue de panier vide

        } else {
            //l'utilisateur est connecté
            if (isset($_SESSION['nom'])) {

                $_SESSION['panier'] = ModelPanier::getAllProduitDansPanierByUser($_SESSION['idUser']);//idUser recuperé à la connexion

                $panier = $_SESSION['panier'];
                //si il est vide on le rederige vers un panier
                if (ModelPanier::getAllProduitDansPanierByUser($_SESSION["idUser"]) == false) {
                    require('view/panierVide/panierVide.php');//deriger vers la vue de panier vide

                } //sinon le rederiger vers la vu de son panier
                //sinon il regarde son panier
                else {
                    require('view/panier/panier.php');
                }
            } //sinon il est juste pas connecté et on  le renvoie à son panier
            else {
                $panier = $_SESSION['panier'];  // ['id' => 'qte', 'id' => 'qte' ...]
                $panierTraite = [];

                foreach ($panier as $idProduit => $qte) {
                    $ligneProduit = ModelPanier::getProduitByidProduit($idProduit);
                    $ligneProduit['qte'] = $qte;
                    $panierTraite[] = $ligneProduit;
                }

                $_SESSION['panier'] = $panierTraite;
                require('view/panier/panier.php');
            }

        }
    }

    public static function addQuantity($idProduit, $idPanier)
    {
        ModelPanier::addInLignePanier($idProduit, $idPanier);
        echo '<body onload="location.href=\'index.php?action=readPanier\'"></body>';
    }

    public static function addQuantitySession($nomProduit)
    {
        $panier = $_SESSION['panier'];
        $_SESSION['panier'] = [];
        foreach ($panier as $produit) {
            $idProd = $produit['idProduit'];
            $qte = $produit['qte'];

            if ($produit['nomProduit'] == $nomProduit) {
                $qte += 1;
                $_SESSION['panier_qte'] +=1;
                $_SESSION['panier'][$idProd] = $qte;

            } else {
                $_SESSION['panier'][$idProd] = $qte;

            }
        }
        header("LOCATION: index.php?action=readPanier");
    }
    public static function removeQuantitySession($nomProduit){

        $panier = $_SESSION['panier'];
        $_SESSION['panier']= [];
        foreach ($panier as $produit) {
            $idProd = $produit['idProduit'];
            $qte = $produit['qte'];

            if ($produit['nomProduit'] == $nomProduit){
                $qte -= 1;
                $_SESSION['panier_qte'] -=1;
                $_SESSION['panier'][$idProd] = $qte;

            }
            else{
                $_SESSION['panier'][$idProd] = $qte;

            }
        }
        header("LOCATION: index.php?action=readPanier");

    }

    public static function removeQuantity($idProduit, $idPanier)
    {
        ModelPanier::removeInLignePanier($idProduit, $idPanier);
        echo '<body onload="location.href=\'index.php?action=readPanier\'"></body>';
    }

    public static function deleteProductFromPanier($idProduit, $idPanier)
    {
        ModelPanier::deleteFromLignePanier($idProduit, $idPanier);
        echo '<body onload="location.href=\'index.php?action=readPanier\'"></body>';
    }
}
