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



    /**
     * @return mixed
     */
    public function getNomCategorie()
    {
        return $this->nomCategorie;
    }










}
