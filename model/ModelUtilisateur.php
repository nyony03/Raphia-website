<?php
require_once File::build_path(array("model","Model.php"));

class ModelUtilisateur
{
    private $idUser;
    private $nom;
    private $prenom;
    private $mdp;
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

    public static function createCompte($nom, $prenom,$mdp, $mail){
        $sql = "SELECT * FROM Raphia_utilisateur WHERE mail =:mail AND mdp =:mdp AND nom =:nom AND prenom =:prenom";
        $req_prep = Model::getPdo()->prepare($sql);
        $value = array(
            "mail" => $mail,
            "mdp" => $mdp,
            "nom" => $nom,
            "prenom" => $prenom,
        );
        $req_prep->execute($value);
        $req_prep->setFetchMode(PDO::FETCH_ASSOC);
        $tabUser = $req_prep->fetchAll();
        var_dump($tabUser);
        if(count($tabUser)>0){
            echo "Vous avez déjà un compte ! Veuillez vous connecté";
        }else{
            $sql = "INSERT INTO Raphia_utilisateur(nom, prenom, mdp, mail) VALUES (:name, :surname, :mdp, :mail)";
            $requete = Model::getPdo()->prepare($sql);
            $values = array(
                "name" => $nom,
                "surname" => $prenom,
                "mdp" => $mdp,
                "mail" => $mail,
            );
            $requete->execute($values);
            require ('view/formulaireCreationCompte/creationCompteOK.php');  //"redirige" vers la vue
        }
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
            header("Location: ../raphia");

        }else{
            echo "ERREUR LOGIN";
        }
    }

    public static function deconnexion()
    {
        // On écrase le tableau de session
        $_SESSION = array();

        // Si vous voulez détruire complètement la session, effacez également
        // le cookie de session.
        // Note : cela détruira la session et pas seulement les données de session !
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // On détruit la session
        session_destroy();

        header("Location: ../raphia");

    }
}