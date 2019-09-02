<?php
    require "../Outil/lecteur-liens.php";
    require $require_lecteur_fichier;
    require $require_lecteur_musique;
    
    $dossier = ScanDossier($liensHomeMusique);
    $fichier = ScanFichiers($liensHomeMusique);

    for($p=0;$p<sizeof($dossier);$p++)
    {
        $sousfichier = ScanFichiers($liensHomeMusique.$dossier[$p]);
    }

    $indexmulti = sizeof($fichier)+sizeof($sousfichier);
    $o=0;
    for($m=0;$m<$indexmulti;$m++)
    {
        if($m<sizeof($fichier))
        {
            $fichierfin[$m]=$fichier[$m];
        }else
        {
            $fichierfin[$m]=$sousfichier[$o];
            
            $o++;
        }
    }
    
    if(isset($_GET["musique"]))
    if($_GET["musique"])
    {
        $musique = $lien_retour_musique.$_GET["musique"];
        $liens = $liensHomeMusique.$_GET["musique"];
    }
    require $require_vue_affichage_musique;
?>