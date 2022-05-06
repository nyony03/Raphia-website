<?php
require_once File::build_path(array("model","Model.php"));


class ModelProduit
{
    private $idPoduit;
    private $nomProduit;
    private $prixProduit;
    private $idCategorie;
    private $description;
    private $image;


    public static function getAllProduit()
    {
        $pdo = Model::getPdo();
        $rep = $pdo->query("SELECT * FROM Raphia_Produit");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit'); //appel à partir d'une classe
        $tabProduit = $rep->fetchAll();
        return $tabProduit;
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

    public static function getProduitByCat($nomCategorie){
        $sql = "SELECT * FROM Raphia_Produit
                JOIN Raphia_Categorie ON Raphia_Produit.idCategorie = Raphia_Categorie.idCategorie 
                WHERE nomCategorie=:nomCategorie";
        $sql_prep = Model::getPdo()->prepare($sql);
        $produit = array(
            'nomCategorie' => $nomCategorie,
        );
        $sql_prep->execute($produit);
        $sql_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
        $tab_pdt = $sql_prep->fetchAll();

        if (empty($tab_pdt))
            return false;
        return $tab_pdt;
    }


    public function afficher()
    {
        echo "<div class='col'>";
        echo "<div class='card'><img class='card-img-top w-100 d-block fit-cover' style='height: 200px;' src='{$this->image}'>";
            echo "<div class='card-body p-4'>";
                echo "<h4 class='card-title'>{$this->nomProduit}</h4>";
                echo "<p class='card-text'>{$this->description}</p>";
                echo "<p class='card-text'>{$this->prixProduit} €</p>";
                echo "<button class='btn btn-primary' type='button' style='background: #d36e70;color: rgb(255,255,255);border-width: 0px;opacity: 1;'>AJOUT AU PANIER</button>";
            echo "</div>
            </div>
        </div>";

    }


/**
     * @return mixed
     */
    public function getIdPoduit()
    {
        return $this->idPoduit;
    }

    /**
     * @return mixed
     */
    public function getNomProduit()
    {
        return $this->nomProduit;
    }

    /**
     * @return mixed
     */
    public function getPrixProduit()
    {
        return $this->prixProduit;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }





}
