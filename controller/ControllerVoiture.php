<?php
require_once File::build_path(array("model","ModelVoiture.php")); // chargement du modèle
class ControllerVoiture {
    public static function readAll() {
        $tab_v = ModelVoiture::getAllVoiture();     //appel au modèle pour gerer la BD
        require ('view/voiture/list.php');  //"redirige" vers la vue
    }

    public static function read(){
        $v = ModelVoiture::getVoitureByImmat($_GET['immat']);
        if(empty($v)){
            require ('view/voiture/error.php'); //affiche erreur si la voiture n'existe pas
        }else{
            require ('view/voiture/detail.php');  //"redirige" vers la vue detail
        }
    }

    public static function create(){
        require ('view/voiture/create.php');
    }

    public static function created(){
        require ('view/voiture/create.php');
        $marque = $_POST["marque"];
        $couleur = $_POST["couleur"];
        $immatriculation = $_POST["immatriculation"];
        $newVoiture = new ModelVoiture($marque, $couleur, $immatriculation);
        $newVoiture->save();
        ControllerVoiture::readAll();
    }


}
