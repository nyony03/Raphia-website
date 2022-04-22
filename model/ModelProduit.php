<?php
class ModelProduit
{
    private $idPoduit;
    private $nomProduit;
    private $prixProduit;
    private $categorieProduit;

    public function __construct($idProduit = NULL, $nomProduit = NULL,
                                $prixProduit = NULL, $categorieProduit = NULL)
    {

        if (!is_null($idProduit) && !is_null($nomProduit) &&
            !is_null($prixProduit) && !is_null($categorieProduit)) {
            $this->$idProduit = $idProduit;
            $this->$nomProduit = $nomProduit;
            $this->$prixProduit = $prixProduit;
            $this->$categorieProduit = $categorieProduit;
        }


    }

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
}
