<?php
class ModelProduit
{
    private $idPoduit;
    private $nomProduit;
    private $prixProduit;
    private $cathegorieProduit;

    public function __construct($idProduit = NULL, $nomProduit = NULL,
                                $prixProduit = NULL, $cathegorieProduit = NULL)
    {

        if (!is_null($idProduit) && !is_null($nomProduit) &&
            !is_null($prixProduit) && !is_null($cathegorieProduit)) {
            $this->$idProduit = $idProduit;
            $this->$nomProduit = $nomProduit;
            $this->$prixProduit = $prixProduit;
            $this->$cathegorieProduit = $cathegorieProduit;
        }


    }
}
