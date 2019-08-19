<?php
    $liensdossiermusique = "/home/Samba/Musique/";
    $fichier = ScanFichiers($liensdossiermusique);
    $dossier = ScanDossier($liensdossiermusique);
    require "../Vue/affichage-musique.php";
    if(isset($_GET["musique"]))
    if($_GET["musique"])
    {
        $musique = "../Musique/".$_GET["musique"];
    }
?>

<?php
    function LecteurAudio($liens)
    {
        echo "
        <audio controls>
        <source src='".$liens."' type='audio/mpeg'>
        <source src='".$liens."' type='audio/ogg'>
        <p>Votre navigateur ne prend pas en charge l'audio HTML. Voici un
           un <a href='myAudio.mp4'>lien vers le fichier audio</a> pour le 
           télécharger.</p>
      </audio>";
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