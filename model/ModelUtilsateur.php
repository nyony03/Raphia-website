<?php

class ModelUtilsateur
{
    private $idUser;
    private $nom;
    private $prenom;
    private $adresse;
    private $mail;

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    public static function getNomUtilisateur($name){
        $sql = "SELECT * FROM Raphia_utilisateur WHERE nom =:nom_tag";
        $requete = Model::getPdo()->prepare($sql);
        $values = array (
            "nom_tag" => $name,
        );
         $requete->execute($values);

         $requete->setFetchMode(PDO::FETCH_CLASS,'ModeUtilisateur');
         $tab_user = $requete->fetchAll();

         if(empt($tab_user))
             return false;
         return $tab_user[0];
    }

    public function createSave()
    {
        $sql = "INSERT INTO Raphia_utilisateur(nom, prenom, adresse, mail, idUser) VALUES (:name, :surname, :ad, :mail)";
        $requete = Model::getPdo()->prepare($sql);
        $values = array(
            "name" => $this->nom,
            "surname" => $this->prenom,
            "ad" => $this->adresse,
            "mail" => $this->mail,
        );
        $requete->execute($values);
    }
}