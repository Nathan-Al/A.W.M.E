<?php
    require "../Outil/lecteur-liens.php";
    require $require_lecteur_fichier;
    require $require_lecteur_musique;
    
    $fichier = ListerTotalitefichier($liensHomeMusique);
    
    if(isset($_GET["musique"]))
    if($_GET["musique"])
    {
        $musique = $lien_retour_musique.$_GET["musique"];
        $liens = $liensHomeMusique.$_GET["musique"];
    }
    require $require_vue_affichage_musique;
?>