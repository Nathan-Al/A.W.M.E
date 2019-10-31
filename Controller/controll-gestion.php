<?php
require "../Outil/lecteur-liens.php";
require $require_createur_fichier;
require $require_lecteur_fichier;

$fichiers = array();
$fichiers = str_replace("affichage-","",ScanFichiers($dossier_vue));


$dossier = array("vue"=>$dossier_vue, "controller"=>$dossier_controll, "css"=>$dossier_css);
if(isset($_POST["create"]))
if($_POST["name"]!="" && $_POST["name"]!=null)
{
    $nomPage = nettoyageCharacters($_POST["name"]);

    if(CreeFichier($dossier,$nomPage,true))
    echo "Fichier créer !";   
}


if(isset($_POST["supp"]))
if($_POST["name"]!="" && $_POST["name"]!=null)
{
    $nomPage = nettoyageCharacters($_POST["name"]);
    
    if(SupprimerFichier($dossier,$nomPage))
    echo "Fichier supprimer !";
}


require $require_vue_gestion;
