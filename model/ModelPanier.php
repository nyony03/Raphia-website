
<?php
require_once File::build_path(array("model","Model.php")); // chargement du modèle
require_once File::build_path(array("model","ModelPanier.php")); // chargement du modèle



class ModelPanier
{


    private $nomProduit;
    private $qte;
    private $prixProduit;
    private $image;
    private $idPanier;
    private $idProduit;


    public function getNomProduit()
    {
        return $this->nomProduit;
    }


    public function getQte()
    {
        return $this->qte;
    }


    public function getPrixProduit()
    {
        return $this->prixProduit;
    }


    public function getImage()
    {
        return $this->image;
    }


    public function getIdPanier()
    {
        return $this->idPanier;
    }


    public function getIdProduit()
    {
        return $this->idProduit;
    }






    public static function getAllProduitDansPanierByUser($idUtilisateur){
        require_once File::build_path(array("model","Model.php")); // chargement du modèle
        require_once File::build_path(array("model","ModelPanier.php")); // chargement du modèle


        $sql = "SELECT nomProduit, qte, prixProduit, image, p.idProduit, pan.idPanier
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
        $tabObjetLignesPanier = $sql_prepare->fetchAll();




        if(empty($tabObjetLignesPanier)){
            return false;
        }
        else {

            $tablignePanier = [];
            for($i = 0; $i < sizeof($tabObjetLignesPanier); $i++) {
                $tablignePanier[$i]['nomProduit'] = $tabObjetLignesPanier[$i]->getNomProduit();
                $tablignePanier[$i]['prixProduit'] = $tabObjetLignesPanier[$i]->getPrixProduit();
                $tablignePanier[$i]['qte'] = $tabObjetLignesPanier[$i]->getQte();
                $tablignePanier[$i]['image'] = $tabObjetLignesPanier[$i]->getImage();
                $tablignePanier[$i]['idPanier'] = $tabObjetLignesPanier[$i]->getIdPanier();
                $tablignePanier[$i]['idProduit'] = $tabObjetLignesPanier[$i]->getIdProduit();
            }
            return $tablignePanier;

        }
    }

    public static function addInLignePanier($idProduit, $idPanier){

        $sql = 'UPDATE Raphia_lignePanier
                SET qte = qte+1
                WHERE idPanier =:id_Panier AND idProduit =:id_Produit';
        $sql_prepare = Model::getPdo()->prepare($sql);

        $values = array(
            "id_Produit" => $idProduit,
            "id_Panier" => $idPanier,
        );

        $sql_prepare->execute($values);



    }

    public static function removeInLignePanier($idProduit, $idPanier){

        $sql2 = 'UPDATE Raphia_lignePanier
                SET qte = qte-1
                WHERE idPanier =:id_Panier AND idProduit =:id_Produit';
        $sql_prepare = Model::getPdo()->prepare($sql2);

        $values2 = array(
            "id_Produit" => $idProduit,
            "id_Panier" => $idPanier,
        );

        $sql_prepare->execute($values2);



    }
    public static function deleteFromLignePanier($idProduit, $idPanier){

        $sql = 'DELETE FROM Raphia_lignePanier
                WHERE idPanier =:id_Panier AND idProduit =:id_Produit';
        $sql_prepare = Model::getPdo()->prepare($sql);

        $values2 = array(
            "id_Produit" => $idProduit,
            "id_Panier" => $idPanier,
        );

        $sql_prepare->execute($values2);



    }
    
    public static function deleteAllPanier(){
        $tabLignesPanbier = ModelPanier::getAllProduitDansPanierByUser($_SESSION['idUser']);
        $idPanier = $tabLignesPanbier[0]['idPanier'];
        foreach ($tabLignesPanbier as $i => $ligneProduit){
            $idPanier = $ligneProduit['idPanier'];
            $idProduit = $ligneProduit['idProduit'];

            $sql = 'DELETE FROM Raphia_lignePanier
                WHERE idPanier =:id_Panier AND idProduit =:id_Produit';
            $sql_prepare = Model::getPdo()->prepare($sql);

            $values2 = array(
                "id_Produit" => $idProduit,
                "id_Panier" => $idPanier,
            );

            $sql_prepare->execute($values2);
        }



        $sql = 'DELETE FROM Raphia_Panier
                WHERE idPanier =:id_Panier ';
        $sql_prepare = Model::getPdo()->prepare($sql);

        $values2 = array(
            "id_Panier" => $idPanier,
        );

        $sql_prepare->execute($values2);



        
    }
}