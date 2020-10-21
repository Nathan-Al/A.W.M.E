<?php
    require "../Outil/lecteur-liens.php";
    require $require_lecteur_fichier;
    require $require_lecteur_video;
    if(isset($_POST["nbreq"]))
        $far_from_home = $_POST["nbreq"]+1;
    else
        $far_from_home = 0;
    $dos="";
    $video = "";
    $dossier = array();
    $videosansmp4 = "";
    /**
     * Donnée envoyer par POST via script JavaScript
     * Par défaut la variable meza est le Array reécupérer en JSON
     * quand un liens est envoyer par le script il devriendra le dossier ou les fichiers seront chercher
     */
    if(isset($_POST["dossier_chgp"]) && $_POST["nbreq"]>0)
    {
        $meza = $_POST["dossier_chgp"];

        $dossier= array();
        $liens_video = array();
        $dossier_raw = ScanDossier($meza);
        $dossier_liens = array();
        $liens_video_raw = chargeLiens($meza);
        $fichiers = array();
        $sous_titre_dossier_raw = chargeLiens($liens_dossier_sous_titre);
        $sous_titre= array();
        $t = 0;$s=0;$m = 0; $l =0;
        if($liens_video_raw!=false)
        {
            for($p = 0; $p < sizeof($liens_video_raw); $p++)
            {
                $a = explode("/", $liens_video_raw[$p]);
                $exten = strrchr($a[sizeof($a)-1],".");
                if(gettype(stripos($a[sizeof($a)-1],"$"))!="integer")
                {
                    if(strpos($a[sizeof($a)-1],".")!=0 || strpos($a[sizeof($a)-1],".")==false)
                    {
                        if(!strpos($a[sizeof($a)-1],".") && strpos($a[sizeof($a)-1],".")==false)
                        {
                            if(strpos($a[sizeof($a)-1],".")==0 && gettype(stripos($a[sizeof($a)-1],"."))!="integer")
                            {
                                $dossier_liens[$m] = $liens_video_raw[$p];
                                $m++;
                            } 
                        }
                    }
    
                    if($exten == ".mp4" || $exten == ".avi" || $exten ==".mkv" || $exten == ".mp3")
                    {
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
                    }
                }
                
            }
        }
        if($dossier_raw!=false)
        {
            for($p = 0; $p < sizeof($dossier_raw); $p++)
            {
                $a = explode("/", $dossier_raw[$p]);
                $exten = strrchr($a[sizeof($a)-1],".");
                if(gettype(stripos($a[sizeof($a)-1],"$"))!="integer")
                {
                    if(strpos($a[sizeof($a)-1],".")!=0 || strpos($a[sizeof($a)-1],".")==false)
                    {
                        if(!strpos($a[sizeof($a)-1],".") && strpos($a[sizeof($a)-1],".")==false)
                        {
                            if(strpos($a[sizeof($a)-1],".")==0 && gettype(stripos($a[sizeof($a)-1],"."))!="integer")
                            {
                                $dossier[$l] = $dossier_raw[$p];
                                $l++;
                            }    
                        }
                    }
                }
            }
        }

        foreach($sous_titre_dossier_raw as $key => $value){
            $sous_titre [$key] = $value;
        }


        if(!sizeof($fichiers)==sizeof($liens_video))
        {
            //Verifier chaque entrer pour aligner tout les liens et les fichiers
        }
        if(!sizeof($dossier)==sizeof($dossier_liens))
        {
            //Verifier chaque entrer pour aligner tout les liens et les fichiers
        }
        
        
        if(isset($_POST["dossier_chgp"]))
        {
            $data = ['fichiers'=>$fichiers,'dossiers'=>$dossier,'liens_video'=>$liens_video,'liens_dossier'=>$dossier_liens,'sous_titre'=>$sous_titre,'current_dir'=>$meza];
            echo json_encode($data);
        }
        $video = "default";
    }
    if(isset($_POST["nbreq"]) || $far_from_home==0)
    {
        //Comportement normal alias home
        foreach($liensHomeVideo as $index=>$value)
        {
            $dossier[$index]= str_replace("../","",$value);
        }
        $dossier_liens = $liensHomeVideo;
        $meza = $liensHomeVideo;
        if(isset($_POST["nbreq"]))
        {
            if($_POST["nbreq"]==0)
            {
                $data = ['fichiers'=>null,'dossiers'=>$dossier,'liens_video'=>null,'liens_dossier'=>$dossier_liens,'current_dir'=>$meza];
                echo json_encode($data);
            }
        }
    }
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