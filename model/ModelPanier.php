
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
            $tablignePanier['nomProduit'] =  $tabObjetLignesPanier[0]->getNomProduit();
            $tablignePanier['prixProduit'] = $tabObjetLignesPanier[0] -> getPrixProduit();
            $tablignePanier['qte'] =  $tabObjetLignesPanier[0]->getQte();
            $tablignePanier['image'] = $tabObjetLignesPanier[0]->getImage();
            $tablignePanier['idPanier'] = $tabObjetLignesPanier[0]->getIdPanier();
            $tablignePanier['idProduit'] = $tabObjetLignesPanier[0]->getIdProduit();
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
        $sql_prepare2 = Model::getPdo()->prepare($sql2);

        $values2 = array(
            "id_Produit" => $idProduit,
            "id_Panier" => $idPanier,
        );

        $sql_prepare2->execute($values2);



    }
}