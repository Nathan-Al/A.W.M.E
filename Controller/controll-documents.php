<?php
require "../Outil/lecteur-liens.php";
require $require_lecteur_fichier;

$dossier = array();
$fichiers = array();
$dossier = ScanDossierDoc($liensHomeDocuments);
$fichiers_raw = ScanFichiersDoc($liensHomeDocuments);
$liens_fichiers_raw = chargeLiens($liensHomeDocuments);
$inde = 0;
for($m = 0; $m < sizeof($fichiers_raw); $m++)
{
    $name = substr($fichiers_raw[$m],strrpos($fichiers_raw[$m],"/"),strlen($fichiers_raw[$m]));
    if($name != ".gitignore")
    {
        $fichiers[$inde] =  $name;
        $inde++;
    }
}
$inde = 0;
for($m = 0; $m < sizeof($liens_fichiers_raw); $m++)
{
    $name = substr($liens_fichiers_raw[$m],strrpos($liens_fichiers_raw[$m],"/")+1,strlen($liens_fichiers_raw[$m]));
    if($name != ".gitignore")
    {
        if(strrpos($name,"."))
        {
            $liens_fichiers[$inde] = str_replace(" ","%20",$liens_fichiers_raw[$m]);
            $inde++;
        }
    }
}

$vue = CheckLink($require_vue_affichage_documents);
require $vue; 

?>