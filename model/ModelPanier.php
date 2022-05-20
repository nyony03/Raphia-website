<?php

require_once File::build_path(array("model", "Model.php"));

class ModelPanier
{
    private $nomProduit;
    private $quantité;
    private $prixProduit;
    private $image;
    private $total;

    public static function getAllProduitDansPanierByUser($idUtilisateur)
    {
        require_once File::build_path(array("model", "Model.php")); // chargement du modèle
        require_once File::build_path(array("model", "ModelPanier.php")); // chargement du modèle


        $sql = "SELECT nomProduit, qte, prixProduit, image, p.idProduit, pan.idPanier
                FROM Raphia_Produit p
                JOIN Raphia_lignePanier lp ON lp.idProduit = p.idProduit
                JOIN Raphia_Panier pan ON pan.idPanier = lp.idPanier
                WHERE idUser=:id_utilisateur";
        $sql_prepare = Model::getPdo()->prepare($sql);

        $values = array(
            "id_utilisateur" => $idUtilisateur,
        );


        $sql_prepare->execute($values);

        $sql_prepare->setFetchMode(PDO::FETCH_CLASS, 'ModelPanier');
        $tabObjetLignesPanier = $sql_prepare->fetchAll();


        if (empty($tabObjetLignesPanier)) {
            return false;
        } else {
            $tablignePanier = [];
            $tablignePanier['nomProduit'] = $tabObjetLignesPanier[0]->getNomProduit();
            $tablignePanier['prixProduit'] = $tabObjetLignesPanier[0]->getPrixProduit();
            $tablignePanier['qte'] = $tabObjetLignesPanier[0]->getQte();
            $tablignePanier['image'] = $tabObjetLignesPanier[0]->getImage();
            $tablignePanier['idPanier'] = $tabObjetLignesPanier[0]->getIdPanier();
            $tablignePanier['idProduit'] = $tabObjetLignesPanier[0]->getIdProduit();
            return $tablignePanier;

        }
    }


    public static function getIdPanierByIdUser($idUser)
    {
        $sql = "SELECT idPanier FROM Raphia_Panier WHERE idUser =:idUser";
        $requete = Model::getPdo()->prepare($sql);
        $values = array(
            "idUser" => $idUser,
        );
        $requete->execute($values);

        $requete->setFetchMode(PDO::FETCH_CLASS, 'ModePanier');
        $idPanier = $requete->fetchColumn();

        if (!$idPanier)
            return false;
        return $idPanier;
    }

    public static function getLignePanierByIdUser($idUser)
    {
        $sql = "SELECT idProduit, qte FROM Raphia_lignePanier 
                JOIN Raphia_Panier ON Raphia_Panier.idPanier = Raphia_lignePanier.idPanier 
                WHERE idUser =:idUser";
        $requete = Model::getPdo()->prepare($sql);
        $values = array(
            "idUser" => $idUser,
        );
        $requete->execute($values);

        $requete->setFetchMode(PDO::FETCH_KEY_PAIR);
        $panier = $requete->fetchAll();

        return $panier;
    }

    public static function mergePanierSessionDb()
    {
        foreach ($_SESSION['panier'] as $produit => $qte) {
            $sql = "SELECT qte FROM Raphia_lignePanier WHERE idProduit =:idProduit AND idPanier =:idPanier";
            $requete = Model::getPdo()->prepare($sql);
            $values = array(
                "idProduit" => $produit,
                "idPanier" => $_SESSION['idPanier'],
            );
            $requete->execute($values);
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            $produit_exist = $requete->fetchColumn();

            if (!$produit_exist) {
                ModelProduit::createLignePanier($_SESSION['idPanier'], $produit);
            } else {
                ModelProduit::ajouterQuantiteProduit($_SESSION['idPanier'], $produit);
            }
        }

    }
}