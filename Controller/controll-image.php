<?php
require "../Outil/lecteur-liens.php";
require $require_lecteur_fichier;
if(isset($_GET["nomimage"]))
{
    $liens_image = $_GET["nomimage"];
    list($width, $height, $type, $attr) = getimagesize($lien_retour_images.$liens_image);
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
}else
{
    echo "error image introuvable";
}

require $require_vue_affichage_image;

?>