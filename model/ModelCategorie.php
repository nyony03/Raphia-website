<?php
require_once File::build_path(array("model","Model.php"));
require_once File::build_path(array("model","ModelProduit.php"));

class ModelCategorie
{
    private $nomCategorie;

    public static function getAllNameCategorie()
    {
        $pdo = Model::getPdo();
        $rep = $pdo->query("SELECT nomCategorie FROM Raphia_Categorie");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCategorie'); //appel à partir d'une classe
        $tabCategorie = $rep->fetchAll();
        return $tabCategorie;
    }

    public static function getIdCategorieByName($nomCategorie)
    {
        $sql = "SELECT idCategorie FROM Raphia_Categorie WHERE nomCategorie =:nomCategorie";
        $requete = Model::getPdo()->prepare($sql);
        $values = array(
            "nomCategorie" => $nomCategorie,
        );
        $requete->execute($values);

        $requete->setFetchMode(PDO::FETCH_CLASS, 'ModelCategorie');
        $idCategorie = $requete->fetchColumn();

        if (!$idCategorie)
            return false;
        return $idCategorie;
    }


    /**
     * @return mixed
     */
    public function getNomCategorie()
    {
        return $this->nomCategorie;
    }










}
