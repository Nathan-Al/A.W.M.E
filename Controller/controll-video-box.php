<?php
require "../Outil/lecteur-fichier.php";
require "../Outil/lecteur-video.php";


if(isset($_GET["video"]))
    {
        if(isset($_GET["dossier"]))
        {
            if($_GET["dossier"]!=null && $_GET["dossier"]!="")
            {
                $dos = $dos."/".$_GET["dossier"];
                $meza = "/home/Samba/Video/".$dos."/";
            }
        }else
        {
            $meza = '/home/Samba/Video/';
        }

        if($_GET["video"]=="default")
        {
            $fichiers = ScanFichiers($meza);
            $dossier = ScanDossier($meza);
            require "../Vue/affichage-video-box.php";  
        }
        elseif($_GET["video"]!="" && $_GET["video"]!=null)
        {
            $video = $_GET["video"];
            $nom = $_GET["dossier"];
            require "../Vue/affichage-lecteur-video.php";
        }elseif(isset($_GET["dossier"]))
        {
            if($_GET["NomDossierPlus"]!=null && $_GET["NomDossierPlus"]!="")
            {
                echo $_POST["NomDossierPlus"];
            }
        }

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