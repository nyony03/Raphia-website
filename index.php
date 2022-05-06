<?php
session_start(); //démarrage de la session
//quoi qu'il arrive s'il trouve des erreurs, il doit afficher
error_reporting(E_ALL);
ini_set('display_errors', 1);  //forcer l'affichage des erreurs
?>
<?php
require_once ('/home/as/tabbabo/public_html/raphiaphp/lib/File.php');
require_once File::build_path(array("controller","routeur.php"));
