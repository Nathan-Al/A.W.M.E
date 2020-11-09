<?php
require "../Outil/lecteur-liens.php";
require $require_lecteur_fichier;
require $require_lecteur_video;

$meza = $liensHomeVideo;
$avantdossier = "../";
$fichiers_raw = chargeLiens($meza);
$dossier = ScanDossier($meza);
$inde = 0;
for($m = 0; $m < sizeof($fichiers_raw); $m++)
{
    $name = substr($fichiers_raw[$m],strrpos($fichiers_raw[$m],"/")+1,strlen($fichiers_raw[$m]));
    if(strpos($name,".")!=0)
    {
        $fichiers[$inde] =  $name;
        $fichiers_liens[$inde] = $fichiers_raw[$m];
        $inde++;
    }
}

if(isset($_GET["video"]))
    {
        if(isset($_GET["dossier"]))
        {
            if($_GET["dossier"]!=null && $_GET["dossier"]!="")
            {
                $dos = $dos."/".$_GET["dossier"];
                $meza = $liensHomeVideo.$dos."/";
            }
        }else
        {
            $meza = $liensHomeVideo;
        }

        if($_GET["video"]!="" && $_GET["video"]!=null)
        {
            $video = $_GET["video"];
            //$nom = $_GET["dossier"];
            require $require_vue_affichage_lecteur_video;
        }elseif(isset($_GET["dossier"]))
        {
            if($_GET["NomDossierPlus"]!=null && $_GET["NomDossierPlus"]!="")
            {
                echo $_POST["NomDossierPlus"];
            }
        }

    }else
    {
        $vue = CheckLink($require_vue_affichage_video_box);
        require $vue; 
    }

function BoutonRetour($dosierpressent)
    {
        //echo $dosierpressent." ";
        $ch = "/";
        $m = substr(strrchr($dosierpressent, $ch),0);
        $rem = str_replace($m, "",$dosierpressent);
        return $rem;
    }

 
?>