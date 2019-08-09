<?php
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
            require "../Vue/affichage-video.php";  
        }
        elseif($_GET["video"]!="" && $_GET["video"]!=null)
        {
            $video = $_GET["video"];
            $fichiers = ScanFichiers($meza);
            $dossier = ScanDossier($meza);
            require "../Vue/affichage-video.php";
        }elseif(isset($_GET["dossier"]))
        {
            if($_GET["NomDossierPlus"]!=null && $_GET["NomDossierPlus"]!="")
            {
                echo $_POST["NomDossierPlus"];
            }
        }

    }

    function ScanFichiers($meza){
        $dir = $meza;
        if ( is_dir($dir) )  {
            if ( $dh = opendir($dir) ) {
                while ( ($element = readdir($dh)) !== false){{
                        if (	($element != '_vti_cnf')	&
                            ($element != '.')		&
                            ($element != '..')		&
                            ($element != '.DS_Store')	){
                                
                                if (is_dir($dir.'/'.$element))
                                {
                                    //$tb_directories[] = $element;	
                                }
                                else
                                {
                                    $tb_files[] = $element;	
                                }
                            }
                        }	
                    }
                }
            }
        //echo "Size TB".sizeof($tb_files)."Size TB2".sizeof($tb_files2);
       
        return $tb_files;
    }

    function ScanDossier($meza){
        $dir = $meza;
        if ( is_dir($dir) )  {
            if ( $dh = opendir($dir) ) {
                while ( ($element = readdir($dh)) !== false){{
                        if (	($element != '_vti_cnf')	&
                            ($element != '.')		&
                            ($element != '..')		&
                            ($element != '.DS_Store')	){
                                
                                if (is_dir($dir.'/'.$element))
                                {
                                    $tb_directories[] = $element;	
                                }
                                else
                                {
                                    $tb_files[] = $element;	
                                }
                            }
                        }	
                    }
                }
            }
        return $tb_directories;
    }

?>