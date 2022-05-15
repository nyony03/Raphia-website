<?php
require_once File::build_path(array("model","Model.php"));
class ModelLignePanier
{
    public static function getQuantité($idPanier){
        $sql = "SELECT qte FROM Raphia_lignePanier WHERE idPanier =:id_panier";
        $requete = Model::getPdo()->prepare($sql);
        $values = array (
            "id_panier" => $idPanier,
        );
        $requete->execute($values);
        $requete->setFetchMode(PDO::FETCH_CLASS,'ModelLignePanier');
        $tab_ligne_panier = $requete->fetchAll();
        if(empty($tab_ligne_panier))
            return false;
        return $tab_ligne_panier[0];
    }
}