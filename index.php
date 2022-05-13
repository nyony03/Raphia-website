<?php
session_start(); //recupere cookie dans le navigateur et faire le lien
error_reporting(E_ALL);
ini_set('display_errors', 1);  //forcer l'affichage des erreurs
require_once ('/home/as/rakotondran/public_html/raphia/lib/File.php');
require_once File::build_path(array("controller","routeur.php"));
