<?php
require "../Outil/lecteur-liens.php";
require $require_lecteur_fichier;

$page = $_GET["page"];

if(isset($_GET["nomimage"]))
{
    $liens_image = $_GET["nomimage"];
    $imageTypeArray = array
    (
        0=>'UNKNOWN',
        1=>'GIF',
        2=>'JPEG',
        3=>'PNG',
        4=>'SWF',
        5=>'PSD',
        6=>'BMP',
        7=>'TIFF_II',
        8=>'TIFF_MM',
        9=>'JPC',
        10=>'JP2',
        11=>'JPX',
        12=>'JB2',
        13=>'SWC',
        14=>'IFF',
        15=>'WBMP',
        16=>'XBM',
        17=>'ICO',
        18=>'COUNT' 
    );

    list($width, $height, $extension, $attr) = getimagesize($lien_retour_images.$liens_image);
    $type = $imageTypeArray[$extension];
    
    if(filesize($lien_retour_images.$liens_image)>1 && filesize($lien_retour_images.$liens_image)<1024)
        $taille = filesize($lien_retour_images.$liens_image)." octets";
    else if(filesize($lien_retour_images.$liens_image)>1024 && filesize($lien_retour_images.$liens_image)<1048576)
        $taille = filesize($lien_retour_images.$liens_image)." Ko";
    else if(filesize($lien_retour_images.$liens_image)>1048576)
        $taille = filesize($lien_retour_images.$liens_image)." Mio";
    
    
    
}else
{
    echo "error image introuvable";
}

require $require_vue_affichage_image;

?>