<?php
require_once ('lib/File.php');
require_once File::build_path(array("model","Model.php")); // chargement du modèle
require_once File::build_path(array("model","ModelPanier.php")); // chargement du modèle

session_start(); //démarrage de la session
//quoi qu'il arrive s'il trouve des erreurs, il doit afficher
error_reporting(E_ALL);
ini_set('display_errors', 1);  //forcer l'affichage des erreurs
require_once File::build_path(array("controller","routeur.php"));
