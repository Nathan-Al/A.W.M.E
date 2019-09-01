<?php
require "../Outil/lecteur-fichier.php";
$dossier = array();
$fichiers = array();
//$tabliens = chargeLiens();
//$dirname = '/home/Samba/Documents/';
//$tabliens =ScanDirectory($dirname);
$dossier = ScanDossierDoc();
$fichiers = ScanFichiersDoc();

require "../Vue/affichage-documents.php"; 

ScanFichiers($meza);
ScanDossier('/home/Samba/Documents/');

function chargeLiens()
{
    $dirname = '/home/Samba/Documents/';
    
    $dir = opendir($dirname);
    $liens=0;

    while($file = readdir($dir)) 
    {
        $file[$liens] = readdir($dir);
        $liens++;
        echo $file[$liens];
    }

    rsort($file);

    closedir($dir); 
    
    return $file;
}


?>