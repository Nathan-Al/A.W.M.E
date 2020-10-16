<?php
    require "../Outil/lecteur-liens.php";
    require $require_lecteur_fichier;
    require $require_lecteur_video;

    $dos="";
    $meza = $liensHomeVideo;
    $video = "";
    $dossier = "";
    $videosansmp4 = "";

    /**
     * Donnée envoyer par POST via script JavaScript
     * Par défaut la variable meza est le Array reécupérer en JSON
     * quand un liens est envoyer par le script il devriendra le dossier ou les fichiers seront chercher
     */
    if(isset($_POST["dossier_chgp"]))
    {
        $meza = $_POST["dossier_chgp"];
    }

        $dossier= array();
        $liens_video = array();
        $dossier = ScanDossier($meza);
        $dossier_liens = array();
        $liens_video_raw = chargeLiens($meza);
        $fichiers = array();
        $t = 0;$s=0;$m = 0;
        for($p = 0; $p < sizeof($liens_video_raw); $p++)
        {
            $a = explode("/", $liens_video_raw[$p]);
            if(strpos($a[sizeof($a)-1],"."))
            {
                $fichiers[$t] = $a[sizeof($a)-1];
                $t++;
            }
            if(strpos($a[sizeof($a)-1],"."))
            {
                $liens_video[$s] = $liens_video_raw[$p];
                $s++;
            }
            if(!strpos($a[sizeof($a)-1],"."))
            {
                $dossier_liens[$m] = $liens_video_raw[$p];
                $m++;
            }
            
        }

        if(isset($_POST["test"]))
        {
            echo $mama=$_POST["test"];
        }
        
        if(isset($_POST["dossier_chgp"]))
        {
            $data = ['fichiers'=>$fichiers,'dossiers'=>$dossier,'liens_video'=>$liens_video,'liens_dossier'=>$dossier_liens,'current_dir'=>$meza];
            echo json_encode($data);
        }
        $video = "default";

    function BoutonRetour($dosierpressent)
    {
        $ch = "/";
        $m = substr(strrchr($dosierpressent[0], $ch),0);
        $rem = str_replace($m, "",$dosierpressent[0]);
        return $rem;
    }
    if(!isset($_POST["dossier_chgp"]))
    {
        $vue = CheckLink($require_vue_affichage_video);
        require $vue; 
    }
?>