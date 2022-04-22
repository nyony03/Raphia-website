<?php
class ModelProduit
{
    private $idPoduit;
    private $nomProduit;
    private $prixProduit;
    private $categorieProduit;


    public static function getAllProduit(){

        $pdo = Model::getPdo();
        $sql = $pdo->query("SELECT * FROM Raphia_Produit");
        $sql ->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture'); //appel à partir d'une classe
        $tabProduits = $sql->fetchAll();

        return $tabProduits;
    }

    public static function getProduitByCat($categorieProduit){
        $sql = "SELECT * FROM Raphia_Produit WHERE idCategorie=:categorie";

        $sql_prep = Model::getPdo()->prepare($sql);

        $produit = array(
            'categorie' => $categorieProduit,
        );

        $sql_prep->execute($produit);
        $sql_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
        $tab_pdt = $sql_prep->fetchAll();

        if (empty($tab_pdt))
            return false;
        return $tab_pdt[0];

    }

    public static function getProduitByTag($TagProduit){
        $sql = "SELECT * FROM Raphia_Produit WHERE idCategorie=:tag";

        $sql_prep = Model::getPdo()->prepare($sql);

        $produit = array(
            'tag' => $TagProduit,
        );

        $sql_prep->execute($produit);
        $sql_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
        $tab_pdt = $sql_prep->fetchAll();

        if (empty($tab_pdt))
            return false;
        return $tab_pdt[0];

    }

    public function afficher()
    {
        echo "<div>Le Produit  {$this ->nomProduit} de prix {$this->prixProduit} et de categorie {$this -> categorieProduit} </div>";
    }
}
