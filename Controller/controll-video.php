<?php
    require "../Outil/lecteur-liens.php";
    require $require_lecteur_fichier;
    require $require_lecteur_video;

    $dos="";
    $meza = $liensHomeVideo;
    $video = "";
    $dossier = "";
    $videosansmp4 = "";

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
        /*
        $fichiers = ScanFichiers($meza);
        */
        $video = "default";

    /*
    else
    {
        if(isset($_POST["video"]))
        {
            if($_POST["video"]!="" && $_POST["video"]!=null)
            {
                $dossier= array();
                $video = $_POST["video"];
                $videoenvtt = str_replace(".mp4",".vtt", $video);
                $videosansmp4 = str_replace(".mp4"," ", $video);
                $fichiers = ScanFichiers($meza);
                $dossier = ScanDossier($meza);
            }
            
            $choix_video = $_POST["video"];
        }
        elseif(isset($_POST["dossier"]))
        {
            if($_POST["dossier"]!=null && $_POST["dossier"]!="")
            {
                echo $_POST["dossier"];
            }
            $dossier = $_POST["dossier"];
        }
    }*/
    

    function BoutonRetour($dosierpressent)
    {
        //echo $dosierpressent." ";
        $ch = "/";
        $m = substr(strrchr($dosierpressent[0], $ch),0);
        $rem = str_replace($m, "",$dosierpressent[0]);
        return $rem;
    }
    if(!isset($_POST["dossier_chgp"]))
    {
        require $require_vue_affichage_video; 
    }
?>