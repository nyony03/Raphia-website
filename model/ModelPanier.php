
<?php

require_once File::build_path(array("model","Model.php"));

class ModelPanier
{
    private $nomProduit;
    private $quantité;
    private $prixProduit;
    private $image;
    private $total;

    public static function getAllProduitDansPanierByUser($idUtilisateur){

        $sql = "SELECT nomProduit, qte, prixProduit, image
                FROM Raphia_Produit p
                JOIN Raphia_lignePanier lp ON lp.idProduit = p.idProduit
                JOIN Raphia_Panier pan ON pan.idPanier = lp.idPanier
                WHERE idUser=:id_utilisateur";
        $sql_prepare = Model::getPdo()->prepare($sql);

        $values = array(
            "id_utilisateur" => $idUtilisateur,
        );

        $sql_prepare->execute($values);

        $sql_prepare->setFetchMode(PDO::FETCH_CLASS,'ModelPanier');
        $tabLignesPanier = $sql_prepare->fetch(PDO::FETCH_OBJ);

        if(empty($tabLignesPanier)){
            return false;
        }
        else {
            return $tabLignesPanier;
        }
    }

    public static function getIdPanierByIdUser($idUser){
        $sql = "SELECT idPanier FROM Raphia_Panier WHERE idUser =:idUser";
        $requete = Model::getPdo()->prepare($sql);
        $values = array (
            "idUser" => $idUser,
        );
        $requete->execute($values);

        $requete->setFetchMode(PDO::FETCH_CLASS,'ModePanier');
        $idPanier = $requete->fetchColumn();

        if(!$idPanier)
            return false;
        return $idPanier;
    }





}