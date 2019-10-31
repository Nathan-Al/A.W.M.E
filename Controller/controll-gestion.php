<?php
require "../Outil/lecteur-liens.php";
require $require_createur_fichier;
require $require_lecteur_fichier;

$fichiers = array();
$fichiers = str_replace("affichage-","",ScanFichiers($dossier_vue));


$dossier = array("vue"=>$dossier_vue, "controller"=>$dossier_controll, "css"=>$dossier_css);
if(isset($_POST["create"]))
$nomPage = nettoyageCharacters($_POST["name"]);

if(CreeFichier($dossier,$nomPage,true))
echo "Fichier créer !";

require $require_vue_gestion;
