<?php
    require "../Outil/lecteur-liens.php";
    require $require_lecteur_fichier;
    if($liensYoutube!=null)
        $Array_youtube = $liensYoutube;
    else
        $Array_youtube = false;
    require $require_vue_affichage_youtube ;
?>