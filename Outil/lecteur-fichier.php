<?php
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

//Affichage documents

function ScanFichiersDoc($liensfich){
    $dir = $liensfich;
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
    for ($i = 0; $i<sizeof($tb_directories);$i++)
    {
        $dir = $liensfich.$tb_directories[$i];
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
                                    $tb_files2[] = $element;
                                }
                            }
                        }	
                    }
                }
            }
    }
    for ($p = 0; $p < sizeof($tb_file2); $p++)
    {
        $tb_files[]=$tb_files2[$p];
    }
    //echo "Size TB".sizeof($tb_files)."Size TB2".sizeof($tb_files2);
   
    return $tb_files2;
}

function ScanDossierDoc($LiensDoc){
    $dir = $LiensDoc;
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

function chargeLiens($liensenv)
{
        $dirname = $liensenv;
        $dir = opendir($dirname);
        $ona = 0;
        $page = 1;
        while($file[][] = readdir($dir)) 
        {
            $liens = 0;
            for($compteur=0; $compteur<24; $compteur++)
            {
                if($file[$liens][$page] != "." && $file[$liens][$page] != ".." && !is_dir($dirname.$file[$liens][$page] && $file[$liens][$page]!="" && $file[$liens][$page]!=false))
                {
                    //echo readdir($dir),$page. "<br>";
                    $file[$liens][$page] = readdir($dir);
                    //echo "<br> L".$liens."  P".$page."  ".$file[$liens][$page]."<br>";
                    //echo "<br>"."L".$liens."  P".$page;
                }
                if ($file[$liens][$page]=="..")
                {
                    $file[$liens][$page] = "0";
                }
                $liens++;
                
            }
            //echo "<br>"."fin du for"."<br>";
            $page++;
            
        }
        //echo "<br>"."fin while"."<br>";
        
        rsort($file);
        
    return $file;
}

function ListerTotalitefichier($chemindacces)
{
    $dossier = ScanDossier($chemindacces);
    $fichier = ScanFichiers($chemindacces);

    for($p=0;$p<sizeof($dossier);$p++)
    {
        $sousfichier = ScanFichiers($chemindacces.$dossier[$p]);
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
    return $fichierfin;  
}

function ChercherFicher($CharactACherh, $liensDossier)
{
    $dossier = ScanDossier($liensDossier);
    $fichier = ScanFichiers($liensDossier);

    for($p=0;$p<sizeof($dossier);$p++)
    {
        if($dossier[$p] != "." && $dossier[$p] != ".." && !is_dir($dirname.$dossier[$p] && $dossier[$p]!="" && $dossier[$p]!=false && $dossier[$p]!=null))
        {
            $sousfichier = ScanFichiers($liensDossier.$dossier[$p]);
        }
        if ($dossier[$p]=="..")
        {
            $dossier[$p] = "0";
        }
    }

    $indexmulti = sizeof($fichier)+sizeof($sousfichier);
    $o=0;
    for($m=0;$m<$indexmulti;$m++)
    {
        if($m<sizeof($fichier))
        {
            if($fichier[$m] != "." && $fichier[$m] != ".." && !is_dir($dirname.$fichier[$m] && $fichier[$m]!="" && $fichier[$m]!=false && $fichier[$m]!=null))
            {
                $fichierfin[$m]=$fichier[$m];
            }
            if ($fichier[$m]=="..")
            {
                $fichier[$m] = "0";
            }
            
        }else
        {
            $fichierfin[$m]=$sousfichier[$o];
            
            $o++;
        }
    }
    for($l=0;$l<sizeof($fichierfin);$l++)
    {
        
        if($position = strpos($fichierfin[$l],$CharactACherh))
        {
            $lienstrouver[$l] = $fichierfin[$l];
        }
    }
    
    return $lienstrouver;
}

require_once("MP3/Id.php");
 
function read_mp3_tags($dir)
{
   
    static $result = array();
    static $i = 0;
 
    $tag_string = "";
 
    $mp3 = new MP3_Id();
    
    // Tags supported by the MP3_Id class
    $tags = array(
                  "name", "artists", "album",
                  "year", "comment", "track",
                  "genre", "genreno"
                  );
    
 
    // Read the current directory
    $d = dir($dir);
    
    // Loop through all the files in the current directory:
    while (false !== ($file = $d->read()))
    {
        echo "while;";
        // Skip '.' and '..'
        if (($file == '.') || ($file == '..'))
        {
            continue;
        }

        // If this is a directory, then recursively call it
        if (is_dir("{$dir}/{$file}"))
        {
            echo "Lire dossier !!!";
            read_mp3_tags("{$dir}/{$file}");
        }
        else
        {
            echo "Lire Fichier !!!!";
            // It's a mp3 file so read the tags
            if(strtolower(substr($file, strlen($file) - 3, 3)) == "mp3") 
            {
                $data = $mp3->read("{$dir}/{$file}");
 
                // OOPs, some error occured, just save the filename
                if (PEAR::isError($data))
                { 
                    $result[$i]['filename'] = $file;
                    $result[$i]['directory'] = $dir;
                }
                else
                {
                    $result[$i]['filename'] = $file;
                    $result[$i]['directory'] = $dir;
 
                    // Read all the tags of the particular file
                    foreach($tags as $tag)
                    {
                        $result[$i][$tag] = $mp3->getTag($tag);
                    }
                }
                $i++;
            }
        }
    }
 
    return $result;
}
?>