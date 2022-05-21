<?php
require_once File::build_path(array("model","Model.php")); // chargement du modèle

class ModelCommande
{
    private $nomProduit;
    private $qte;
    private $prixProduit;
    private $image;
    private $idCommande;
    private $idProduit;

    public static function getCommandNumber(){
        $idUtilisateur = $_SESSION['idUser'];
        $sql = "SELECT COUNT(idCommande) 
                FROM Raphia_Commande
                WHERE idUtilisateur=:id_Utilisateur";

        $sql_prepare = Model::getPdo()->prepare($sql);
        $values = array(
            "id_Utilisateur" => $idUtilisateur,
        );

        $sql_prepare->execute($values);

        $sql_prepare->setFetchMode(PDO::FETCH_CLASS,'ModelPanier');
        $tabNbCommande = $sql_prepare->fetchcolumn();
        if(empty($tabNbCommande)){
            return 1;
        }
        else {

            return $tabNbCommande+1;
        }
    }

    public static function creatCommande(){
        $idUtilisateur = $_SESSION['idUser'];
        $idCommande= ModelCommande::getCommandNumber();

        $date =date("Ymd");
        $totalCommande =  $_SESSION['totalPanier'];

        $sql = "INSERT INTO Raphia_Commande(idCommande, idUtilisateur, dateCommande, montantTotal) 
                VALUES (:id_commande, :id_utilisateur, :date_commande,:montant_total)";

        $sql_prepare = Model::getPdo()->prepare($sql);
        $values = array(
            "id_commande" => $idCommande,
            "id_utilisateur" => $idUtilisateur,
            "date_commande" => $date,
            "montant_total" => $totalCommande,
        );
        $sql_prepare->execute($values);

    }

    public static function createLignesCommandes(){
        $lignesPanier = ModelPanier::getAllProduitDansPanierByUser($_SESSION['idUser']);
        $idCommande = ModelCommande::getCommandNumber()-1;
        $idUtilisateur = $_SESSION['idUser'];

        foreach ($lignesPanier as $i => $produit) {
            $idProduit = $produit['idProduit'];
            $quantity = $produit['qte'];
            $prix = $produit['prixProduit'];

            $sql = "INSERT INTO Raphia_LigneCommande(idCommmande, idUser ,idProduit, qte, prix) 
                VALUES (:id_commande, :id_Utilisateur, :id_Produit, :quantity,:prix_produit)";

            $sql_prepare = Model::getPdo()->prepare($sql);
            $values = array(
                "id_commande" => $idCommande,
                "id_Produit" => $idProduit,
                "quantity" => $quantity,
                "prix_produit" => $prix,
                "id_Utilisateur"=> $idUtilisateur,
            );
            $sql_prepare->execute($values);


        }
    }





}