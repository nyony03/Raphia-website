<?php

require_once File::build_path(array("model","Model.php"));

class ModelVoiture
{

    private $marque;
    private $couleur;
    private $immatriculation;

    /**
     * @return mixed
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @return mixed
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    public function getImmatriculation(){
        return $this -> immatriculation;
    }


    public function __construct($m = NULL, $c = NULL, $i = NULL)
    {
        if (!is_null($m) && !is_null($c) && !is_null($i)) {
            // Si aucun de $m, $c et $i sont nuls,
            // c'est forcement qu'on les a fournis
            // donc on retombe sur le constructeur à 3 arguments
            $this->marque = $m;
            $this->couleur = $c;
            $this->immatriculation = $i;
        }
    }

    //Exercice8
    public static function getAllVoiture()
    {
        $pdo = Model::getPdo();
        $rep = $pdo->query("SELECT * FROM TD2_voiture");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture'); //appel à partir d'une classe
        $tabVoiture = $rep->fetchAll();
        return $tabVoiture;
    }


    public static function getVoitureByImmat($immat) {
        $sql = "SELECT * FROM TD2_voiture WHERE immatriculation =:nom_tag";
        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "nom_tag" => $immat,
            //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête
        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
        $tab_voit = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_voit))
            return false;
        return $tab_voit[0];
    }

    public function save()
    {
        $sql = "INSERT INTO TD2_voiture (marque, couleur,immatriculation) VALUES (:mark, :coul, :immat)";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array(
            "mark" => $this->marque,
            "coul" => $this->couleur,
            "immat" => $this->immatriculation,
        );
        $req_prep->execute($values);
    }

    public function __toString()
    {
        return $this->immatriculation;
    }

    // une methode d'affichage.
    public function afficher()
    {
        echo "<div>La voiture  {$this ->immatriculation} de marque {$this->marque} et de couleur {$this -> couleur} </div>";
    }
}
