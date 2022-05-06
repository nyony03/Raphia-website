
<?php

require_once File::build_path(array("model","Model.php"));

class ModelPanier
{


    private $produit;
    private $quantité;
    private $total;

    public static function getAllProduitDansPanierByUser($idUtilisateur){

        $sql = "SELECT nomProduit, qte, prixProduit
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
        $tabLignesPanier = $sql_prepare->fetchAll();

        if(empty($tabLignesPanier)){
            return false;
        }
        else {
            return $tabLignesPanier;
        }
    }
}