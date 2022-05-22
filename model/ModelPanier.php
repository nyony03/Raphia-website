<?php

require_once File::build_path(array("model", "Model.php"));

require_once File::build_path(array("model", "Model.php")); // chargement du modèle
require_once File::build_path(array("model", "ModelPanier.php")); // chargement du modèle
require_once File::build_path(array("model", "ModelUtilisateur.php")); // chargement du modèle

class ModelPanier
{
    private $nomProduit;
    private $quantité;
    private $prixProduit;
    private $image;
    private $total;

    public function getNomProduit()
    {
        return $this->nomProduit;
    }


    public function getQte()
    {
        return $this->qte;
    }


    public function getPrixProduit()
    {
        return $this->prixProduit;
    }


    public function getImage()
    {
        return $this->image;
    }


    public function getIdPanier()
    {
        return $this->idPanier;
    }


    public function getIdProduit()
    {
        return $this->idProduit;
    }


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
            for ($i = 0; $i < sizeof($tabObjetLignesPanier); $i++) {
                $tablignePanier[$i]['nomProduit'] = $tabObjetLignesPanier[$i]->getNomProduit();
                $tablignePanier[$i]['prixProduit'] = $tabObjetLignesPanier[$i]->getPrixProduit();
                $tablignePanier[$i]['qte'] = $tabObjetLignesPanier[$i]->getQte();
                $tablignePanier[$i]['image'] = $tabObjetLignesPanier[$i]->getImage();
                $tablignePanier[$i]['idPanier'] = $tabObjetLignesPanier[$i]->getIdPanier();
                $tablignePanier[$i]['idProduit'] = $tabObjetLignesPanier[$i]->getIdProduit();
            }
            return $tablignePanier;

        }
    }

    public static function addInLignePanier($idProduit, $idPanier)
    {

        $sql = 'UPDATE Raphia_lignePanier
                SET qte = qte+1
                WHERE idPanier =:id_Panier AND idProduit =:id_Produit';
        $sql_prepare = Model::getPdo()->prepare($sql);

        $values = array(
            "id_Produit" => $idProduit,
            "id_Panier" => $idPanier,
        );

        $sql_prepare->execute($values);


    }

    public static function removeInLignePanier($idProduit, $idPanier)
    {

        $sql2 = 'UPDATE Raphia_lignePanier
                SET qte = qte-1
                WHERE idPanier =:id_Panier AND idProduit =:id_Produit';
        $sql_prepare = Model::getPdo()->prepare($sql2);

        $values2 = array(
            "id_Produit" => $idProduit,
            "id_Panier" => $idPanier,
        );

        $sql_prepare->execute($values2);


    }

    public static function deleteFromLignePanier($idProduit, $idPanier)
    {

        $sql = 'DELETE FROM Raphia_lignePanier
                WHERE idPanier =:id_Panier AND idProduit =:id_Produit';
        $sql_prepare = Model::getPdo()->prepare($sql);

        $values2 = array(
            "id_Produit" => $idProduit,
            "id_Panier" => $idPanier,
        );

        $sql_prepare->execute($values2);


    }

    public static function deleteAllPanier()
    {
        $tabLignesPanbier = ModelPanier::getAllProduitDansPanierByUser($_SESSION['idUser']);
        $idPanier = $tabLignesPanbier[0]['idPanier'];
        foreach ($tabLignesPanbier as $i => $ligneProduit) {
            $idPanier = $ligneProduit['idPanier'];
            $idProduit = $ligneProduit['idProduit'];

            $sql = 'DELETE FROM Raphia_lignePanier
                WHERE idPanier =:id_Panier AND idProduit =:id_Produit';
            $sql_prepare = Model::getPdo()->prepare($sql);

            $values2 = array(
                "id_Produit" => $idProduit,
                "id_Panier" => $idPanier,
            );

            $sql_prepare->execute($values2);
        }


        $sql = 'DELETE FROM Raphia_Panier
                WHERE idPanier =:id_Panier ';
        $sql_prepare = Model::getPdo()->prepare($sql);

        $values2 = array(
            "id_Panier" => $idPanier,
        );

        $sql_prepare->execute($values2);

        ModelUtilisateur::createPanierUtilisateur($_SESSION['idUser']);


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

    public static function getProduitByidProduit($idProduit)
    {
        $requete = Model::getPdo()->prepare("
            SELECT nomProduit, prixProduit, image FROM Raphia_Produit WHERE idProduit =:id_produit
        ");
        $requete->execute(["id_produit" => $idProduit]);
        $requete->setFetchMode(PDO::FETCH_ASSOC);

        $objetsProduit = $requete->fetch();

        return [
            'nomProduit' => $objetsProduit['nomProduit'],
            'prixProduit' => $objetsProduit['prixProduit'],
            'image' => $objetsProduit['image'],
            'idProduit'=> $idProduit,
        ];
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