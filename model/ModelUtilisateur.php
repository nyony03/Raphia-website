<?php
require_once File::build_path(array("model","Model.php"));

class ModelUtilisateur
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

         if(empty($tab_user))
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

    public static function authentification($mail, $mdp){
        $sql = "SELECT * FROM Raphia_utilisateur WHERE mail =:mail AND mdp =:mdp";
        $req_prep = Model::getPdo()->prepare($sql);
        $value = array(
            "mail" => $mail,
            "mdp" => $mdp,
        );
        $req_prep->execute($value);
        $req_prep->setFetchMode(PDO::FETCH_ASSOC);
        $tabUser = $req_prep->fetchAll();
        if(count($tabUser)>0){
            //Pour récupérer la session
            $_SESSION['nom'] = $tabUser[0]['nom'];
            $_SESSION['mail'] = $tabUser[0]['mail'];

        }else{
            echo "ERREUR LOGIN";
        }
    }
}