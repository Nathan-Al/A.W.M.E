<?php
require "../Outil/lecteur-liens.php";
require $require_lecteur_fichier;

$dossier = array();
$fichiers = array();
$dossier = ScanDossierDoc($liensHomeDocuments);
$fichiers = ScanFichiersDoc($liensHomeDocuments);
$liens_fichiers = chargeLiens($liensHomeDocuments);
//$liens_document = chargeLiens();

$vue = CheckLink($require_vue_affichage_documents);
require $vue; 

?>